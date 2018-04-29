<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Session, Validator;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{

    public function __construct()
    {
      //  $this->middleware('guest');
    }

    /**
     * List of providers configured in config/services acts as whitelist
     *
     * @var array
     */
    protected $providers = [
        'github',
        'facebook',
        'google',
        'twitter'
    ];

    /**
     * Show the social login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('auth.social');
    }

    /**
     * Redirect to provider for authentication
     *
     * @param $driver
     * @return mixed
     */
    public function redirectToProvider(Request $request,$driver)
    {
		
		if($request->usertype !== null){
			 $request->session()->put('usertype', $request->usertype);
			 Session::save();
		}
		elseif($request->login !== null){
			//$request->session()->put('login', $request->login);
		}
		else{
			return redirect()->back()->withErrors( array('usertype'=>'choose') );
		}
		
        if( ! $this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }
		
        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    /**
     * Handle response of authentication redirect callback
     *
     * @param $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    /**
     * Send a successful response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendSuccessResponse()
    {
        return redirect()->intended('home');
    }

    /**
     * Send a failed response with a msg
     *
     * @param null $msg
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedResponse($msg = null)
    {
		 
        return redirect('/login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    /**
     * Login or create an account for a user
     *
     * @param $providerUser
     * @param $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();
        // if user already found
        if( $user){
            // update the avatar and provider that might have changed
            $user->update([
                'image' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        }else{
            // create a new user
			$value = Session::get('usertype');	
			Session::forget('usertype');
			
            $user = User::create([
                'name' 			=> $providerUser->getName(),
                'email' 		=> $providerUser->getEmail(),
                'image' 		=> $providerUser->getAvatar(),
                'provider' 		=> $driver,
                'provider_id'   => $providerUser->getId(),
                'access_token'  => $providerUser->token,
				'status'   		=> 1,
				'usertype'    =>  $value,
                // user can use reset password to create a password
                'password' => ''
            ]);
        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    /**
     * Check for provider allowed and services configured
     *
     * @param $driver
     * @return bool
     */
    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
	
	
	public function verifyemail(Request $request){
		
		//verifyemail
		$user = User::find(Auth::user()->id);
		$email = $user->email;

		$digits = 78;
		while(1){
			$result = '';
			for($i = 0; $i < $digits; $i++) {
				$result .= mt_rand(0, 9);
			}
			
			if( User::where('confirmationcode', $result)->count() == 0)
				break;
		}
	 
		$link = URL::to('email/verify/confirm') . '/' . $result;
		$user->confirmationcode =  $result;
		$user->save();
	 
		Mail::to($email)->send(new Notification('This is the email verify code.  ' .$link));
		Session::flash('emailverifysend', 'send');
		return Redirect::back()->withErrors(['msg', 'success']);
	}
	
	
	public function verifyemailconfirm($access_token){
		if(!$access_token)
		{
			return redirect('/');
		}
		$user = User::whereaccess_token($access_token)->first();
		if (!$user)
		{
			Session::flash('emailverifyexpired', 'expired');
			return redirect('/login');
		}
		$user->status = 1;
		$user->access_token = null;
		$user->save();
	 
		Session::flash('emailverifysuccess', 'send');
		return redirect('login');
	}
}
