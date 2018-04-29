<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Session;
use Mail, URL;
use App\User;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

		$this->verifyemail($request);
		Session::flash('signup', 'success');
		return redirect('/login');
		
		
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
	
	private function verifyemail(Request $request){
		
		$user = User::where('email', $request->email)->first();
		$email = $user->email;
		$digits = 78;
		while(1){
			$result = '';
			for($i = 0; $i < $digits; $i++) {
				$result .= mt_rand(0, 9);
			}
			
			if(User::where('access_token', $result)->count() == 0)
				break;
		}
	 
		$link_url = URL::to('email/verify/confirm') . '/' . $result;
		$user->access_token =  $result;
		$user->save();
	  
		$message = "Hello ". $user->name."! <br/> 'Kindly click on the link below to verify your Africa Worships account.
			<br/>
			<br/>
			 <a href = '".  $link_url ."'>Click here </a>
			<br/>
			Thanks<br/>
			Africa Worships Team
		";
		
		
		$subject = "Africa Worships Account Verification @";
		$headers  = "From: worship \r\n";
		$headers .= "Reply-To:\r\n";
		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($email, $subject, $message, $headers);
	}

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
