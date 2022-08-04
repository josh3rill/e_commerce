<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Mail\AgentRegistration;
use Illuminate\Http\Request;
use App\User;
use App\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\UserRegistered;
use App\Refererlink;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Validator;
use App\Traits\ReusableCode;



class AuthController extends Controller
{
    //This is a trait for createSlug code
    use ReusableCode;

    public function show_agent_Login(Request $request)
    {
        // $request->session()->forget('url.intended');
        // session(['url.intended' => url()->previous()]);

        if (Auth::guard('agent')->check()) {
            return redirect()->intended('agent/dashboard');
        }
        return view('auth.agent_login');
    }

    public function agent_login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255', 'exists:agents,email'],
            'password' => ['required', 'string', 'min:6']

        ]);
        Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password]);

        if (Auth::guard('agent')->check()) {
            //Check login
            $success_notification = array(
                'message' => 'You are successfully logged in!',
                'alert-type' => 'success'
            );
            return redirect()->route('agent.dashboard')->with($success_notification);
        } else {
            // $success_notification = array(
            //     'message' => 'Incorrect credentials! Try again.',
            //     'alert-type' => 'error'
            // );
            session()->flash('fail', 'Incorrect username or password');

            return redirect()->route('show_agent_Login');

            //   $success_notification = array(
            //     'fail' => 'You are successfully logged in!',
            //     'alert-type' => 'success'
            // );
            // return Redirect::to(Session::get('url.intended'))->with($success_notification);
        }
    }



    public function createAgent(Request $request)
    {
        // $request->validate([
        //     'name'     => ['required', 'string', 'max:255'],
        //     'email'    => ['required', 'string', 'email', 'max:255'],
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:agents'],
        ]);

        if ($validator->fails()) {
            $success_notification = array(
                'message' => 'Unsuccessfull Request. Please Retry',
                'alert-type' => 'error'
            );
            return redirect('/')->with($success_notification)->withErrors($validator)->withInput();
            // return redirect('/')
            //             ->withErrors($validator)
            //             ->withInput();
        }

        //save agent details
        $user = new Agent;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->slug     = $this->createSlug($request->name, new Agent());
        if ($user->save()) {
            $messages = "$user->name, Your registration was successfull! Please click the link below to complete your registration!";
            $name = $user->name;
            $email = $user->email;
            $userRole = 'Agent';

            try {
                Mail::to($user->email)->send(new AgentRegistration($messages, $name, $email, $userRole));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }

            return back()->with('agent-reg-success', 'Please check your email for verification link! <br><b>' . $user->email . '</b>');
        }
    }

    public function agent_Complete_Reg_page(Request $request)
    {
        $param = $request->input('email');
        $email_param = Str::replaceLast('%40', '@', $param);
        $states = State::all();

        if ($email_param) {
            $agent = Agent::where('email', $email_param)->first();
            if ($agent->password) {
                $success_notification = array(
                    'message' => 'You have completed the registration before. Please login as agent',
                    'alert-type' => 'error'
                );
                return redirect()->route('login')->with($success_notification);
            }
            $agent_email = $agent->email;
            $agent_name = $agent->name;
        } else {
            $agent_email = null;
        }
        return view('auth.register_agent2', compact('agent_email', 'agent_name', 'states'));
    }

    public function agent_save_complete_reg(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            // 'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            // 'phone'    => ['required', 'numeric', 'unique:users'],
            'phone'    => ['required', 'numeric'],
            // 'state'    => ['string'],
            // 'lga'      => ['string'],
            'address'      => ['Required', 'string'],
            'bankname'      => ['Required', 'string'],
            'accountname'      => ['Required', 'string'],
            'accountno'      => ['Required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'identification_type' => ['required', 'string'],
            'identification_id' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        $state = $request->state;
        $result = substr($state, 0, 3);
        $ist_3_result = strtoupper($result);
        $randomCode = mt_rand(1000, 9999);
        //To Get The Last Letter
        // $length = 1;
        // $last_letter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
        // $code = $ist_3_result . $randomCode . $last_letter;
        $code = $ist_3_result . $randomCode;

        //save agent details

        //pay with GTPay
        $gtpay_mert_id        = 14435;
        $gtpay_tranx_id       = $this->gen_transaction_id();
        $gtpay_tranx_amt      = 1 * 100;
        $gtpay_tranx_curr     = 566;
        $gtpay_cust_id        = '1';
        $gtpay_tranx_noti_url = url('create_agent');
        $gtpay_cust_name      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $request->phone . '{?#?#}' . $request->state . '{?#?#}' . $request->city . '{?#?#}' . $request->address . '{?#?#}' . $request->bankname . '{?#?#}' . $request->accountname . '{?#?#}' . $request->accountno . '{?#?#}' . $request->identification_type . '{?#?#}' . $request->identification_id . '{?#?#}' . $code;
        $gtpay_tranx_memo     = 'Mobow';
        // $gtpay_echo_data      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $state . '{?#?#}' . $request->phone . '{?#?#}' . $code;
        $gtpay_echo_data      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $request->phone . '{?#?#}' . $request->state . '{?#?#}' . $request->city . '{?#?#}' . $request->address . '{?#?#}' . $request->bankname . '{?#?#}' . $request->accountname . '{?#?#}' . $request->accountno . '{?#?#}' . $request->identification_type . '{?#?#}' . $request->identification_id . '{?#?#}' . $code;
        $gtpay_no_show_gtbank = 'yes';
        $gtpay_gway_name      = 'etranzact';
        $hashkey              = '6470B923CDDE833E02B4CA0329432E8BF29B62B29B6B722397924F40731D44D8324AFE100EE2A4B6BD1299606A7C46D6BF0FF95220C3065F02DC052E7BFE5283';
        $gtpay_hash           = $gtpay_mert_id . $gtpay_tranx_id . $gtpay_tranx_amt . $gtpay_tranx_curr . $gtpay_cust_id . $gtpay_tranx_noti_url . $hashkey;
        $hashed               = hash('sha512', $gtpay_hash);
        $gtPay_Data = [
            'gtpay_mert_id'        => $gtpay_mert_id,
            'gtpay_tranx_id'       => $gtpay_tranx_id,
            'gtpay_tranx_amt'      => $gtpay_tranx_amt,
            'gtpay_tranx_curr'     => $gtpay_tranx_curr,
            'gtpay_cust_id'        => $gtpay_cust_id,
            'gtpay_tranx_noti_url' => $gtpay_tranx_noti_url,
            'gtpay_cust_name'      => $gtpay_cust_name,
            'gtpay_tranx_memo'     => $gtpay_tranx_memo,
            'gtpay_echo_data'      => $gtpay_echo_data,
            'gtpay_no_show_gtbank' => $gtpay_no_show_gtbank,
            'gtpay_gway_name'      => $gtpay_gway_name,
            'hashkey'              => $hashkey,
            'hashed'               => $hashed
        ];

        return view('gttPayView_4_agent', $gtPay_Data);
    }

    public function create_agent(Request $request)
    {
        $returned_data = explode('{?#?#}', $request->gtpay_echo_data);
        // $user              = new Agent;
        $user = Agent::where('email', $returned_data[1])->first();
        $user->name        = $returned_data[0];
        $user->email       = $returned_data[1];
        $user->password    = Hash::make($returned_data[2]);
        $user->phone   = $returned_data[3];
        $user->state = $returned_data[4];
        $user->lga = $returned_data[5];
        $user->address   = $returned_data[6];
        $user->bankname  = $returned_data[7];
        $user->accountname = $returned_data[8];
        $user->accountno   = $returned_data[9];
        $user->identification_type  = $returned_data[10];
        $user->identification_id = $returned_data[11];
        $user->agent_code  = $returned_data[12];

        if ($user->save()) {
            // Auth::login($user);
            if (Auth::guard('agent')->attempt(['email' => $returned_data[1], 'password' => $returned_data[2]])) {
                //Check login
                if (Auth::guard('agent')->check()) {
                    $present_user = Auth::guard('agent')->user();

                    $link = new Refererlink();
                    $link->agent_id = $present_user->id;
                    $link->agent_code = $present_user->agent_code;
                    $link->save();
                    //Add 200 naira to agent total amount
                    // $present_user->refererAmount = $referer->refererAmount + 200;


                    //if login pass,redirect to agent dashboard page
                    return redirect()->intended('agent/dashboard');
                } else {
                    session()->flash('fail', ' Credentials Incorect');
                    return view('auth.agent_login');
                }
            }
            session()->flash('fail', ' Credentials Incorect');
            return view('auth.agent_login');
        }
    }



    public function gen_transaction_id()
    {
        return mt_rand(1000000000, 9999999999);
    }

    public function validate_form(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', Rule::in(['seller', 'buyer'])],
            'phone'    => ['required', 'numeric', 'unique:users']

        ]);
    }

    public function save_buyer(Request $request)
    {
        $this->validate_form($request);
        //save user

        // $slug3 = Str::random(8);
        // $random = Str::random(3);
        // $userSlug = Str::of($request->name)->slug('-') . '' . $random;


        // Get id of owner of $link_from_url if available
        if ($request->referParam) {
            $saveIdOfRefree = User::where('refererLink', $request->referParam)->first();
            if ($saveIdOfRefree) {
                $request->refererId = $saveIdOfRefree->id;
            } else {
                session()->flash('fail', ' The Referer link used is incorrect. Please
                confirm the correct link or register without a link');
                return redirect()->route('home');
            }
        }

        // Get id of owner of $agent code if available
        if ($request->agent_code) {
            $saveIdOfAgent = Agent::where('agent_code', $request->agent_code)->first();
            $saveIdOfRefree = User::where('refererLink', $request->agent_code)->first();
            if ($saveIdOfAgent) {
                $request->agent_Id = $saveIdOfAgent->id;
            } elseif ($saveIdOfRefree) {
                $request->refererId = $saveIdOfRefree->id;
            } else {
                session()->flash('fail', ' Your referer code is incorrect. Please Confirm the correct code or register without a code');
                return redirect()->route('home');
                // return   session()->flash('message', 'there was an error with your payment, please contact admin.');
            }
        }

        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role     = 'seller';
        $user->slug     = $this->createSlug($request->name, new User());
        //save id of referer if user was reffererd
        $user->idOfReferer = $request->refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $request->agent_Id;
        // $user->refererLink = $slug3;
        $user->refererLink = $this->createRefererLink(new User());

        //send mail

        if ($user->save()) {
            session()->forget('current_param');

            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $request->password;
            $userRole     = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }

        if (Auth::check()) {
            $present_user = Auth::user();
            // if referrer link is available, save it to referer table
            $link              = new Refererlink();
            $link->user_id     = $present_user->id;
            $link->refererlink = $present_user->refererLink;
            $link->save();

            // if (Auth::user()->role == 'buyer') {
            //     return  Redirect::to(session(url()->previous()));
            // }


            //level 1 payment start
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    $referer->referals()->create(['user_id' => Auth::id()]);
                    //save my id  as level 1 on the table of the one that reffered me
                    $referer->level1 = Auth::id();
                    $referer->save();

                    //if your referer is an efmarketer staff, redirect user to dashboard
                    if ($referer->is_ef_marketer) {

                        if (Auth::user()->role == 'seller') {
                            return redirect()->route('seller.dashboard');
                        } else {
                            return redirect()->route('admin.dashboard');
                        }
                    }
                }
            }

            $agent_that_refered = $present_user->idOfAgent;
            if ($agent_that_refered) {
                $referer2 = Agent::where('id', $agent_that_refered)->first();
                if ($referer2) {
                    //if my referee is an agent, save my id  as level 1 on the table of the Agent that reffered me
                    $referer2->level1 = Auth::id();
                    $referer2->save();

                    $referer2->referals()->create(['user_id' => Auth::id()]);

                    //if your agent is an efmarketer staff, redirect user to dashboard
                    if ($referer2->is_ef_marketer) {

                        if (Auth::user()->role == 'seller') {
                            return redirect()->route('seller.dashboard');
                        } else if (Auth::user()->role == 'buyer') {
                            return  Redirect::to(Session::get('url.intended'));
                        } else {
                            return redirect()->route('admin.dashboard');
                        }
                    }
                    $referer2->refererAmount = $referer2->refererAmount + 200;
                    $referer2->save();
                }
            }

            //end level 1 payment

            //start level 2

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    $person_that_refered2 = $referer->idOfAgent;
                    if ($person_that_refered2) {
                        $referer2 = Agent::where('id', $person_that_refered2)->first();
                        if ($referer2) {
                            if ($referer2->level2) {
                                if (Auth::user()->role == 'seller') {
                                    return redirect()->route('seller.dashboard');
                                } else if (Auth::user()->role == 'buyer') {
                                    return  Redirect::to(Session::get('url.intended'));
                                } else {
                                    return redirect()->route('admin.dashboard');
                                }
                            }

                            $referer2->refererAmount = $referer2->refererAmount + 150;
                            $referer2->level2 = Auth::id();
                            $referer2->save();
                            // $present_user->level2 = $referer3->id;                    }
                        }

                        // $present_user->level2 = $referer3->id;
                    }
                }
            }
            //end level 2 payment

            //level 1 referer id
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                //level 1 referer
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            //level 3 agent id
                            $person_that_refered3 = $referer3->idOfAgent;
                            if ($person_that_refered3) {
                                //level 3 agent
                                $referer4 = Agent::where('id', $person_that_refered3)->first();
                                if ($referer4) {
                                    if ($referer4->level3) {
                                        if (Auth::user()->role == 'seller') {
                                            return redirect()->route('seller.dashboard');
                                        } else if (Auth::user()->role == 'buyer') {
                                            return  Redirect::to(Session::get('url.intended'));
                                        }
                                    }

                                    // add amount to level 3 referer amount
                                    $referer4->refererAmount = $referer4->refererAmount + 100;
                                    $referer4->level3 = Auth::id();
                                    $referer4->save();
                                    // $present_user->level2 = $referer3->id;
                                }
                            }
                        }
                    }
                }
            }
            //end level 3 payment


            //level 1 referer id
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                //level 1 referer
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            //level 3 referer id
                            $person_that_refered3 = $referer3->idOfReferer;
                            if ($person_that_refered3) {
                                //level 3 referer
                                $referer4 = User::where('id', $person_that_refered3)->first();
                                if ($referer4) {

                                    $person_that_refered4 = $referer4->idOfAgent;

                                    if ($person_that_refered4) {
                                        $referer5 = Agent::where('id', $person_that_refered4)->first();

                                        if ($referer5) {
                                            if ($referer5->level4) {
                                                if (Auth::user()->role == 'seller') {
                                                    return redirect()->route('seller.dashboard');
                                                } else if (Auth::user()->role == 'buyer') {
                                                    return  Redirect::to(Session::get('url.intended'));
                                                }
                                            }

                                            // add amount to level 4 referer amount
                                            $referer5->refererAmount = $referer5->refererAmount + 50;
                                            $referer5->level4 = Auth::id();
                                            $referer5->save();
                                            // $present_user->level2 = $referer3->id;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // end level 4 payment
            if (Auth::user()->role == 'seller') {
                return redirect()->route('seller.dashboard');
            }
        }
    }

    public function pay_with_gtpay(Request $request)
    {
        $agent_Id = null;
        $link_from_url = $request->refer;
        $code_of_agent = $request->agent_code;

        $slug3 = Str::random(8);

        if ($link_from_url) {
            $saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
            $refererId = $saveIdOfRefree->id;
        } else {
            $refererId = null;
        }

        if ($code_of_agent) {
            $saveIdOfAgent = Agent::where('agent_code', $code_of_agent)->first();
            if ($saveIdOfAgent) {
                $agent_Id = $saveIdOfAgent->id;
            }
        }
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', Rule::in(['seller', 'buyer']),]
        ]);

        //save without payment if role is buyer

        if ($request->role == 'buyer') {
            //save user
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            //save id of referer if user was reffererd
            $user->idOfReferer = $refererId;
            //save id of agent if user was brought by agent
            $user->idOfAgent = $agent_Id;
            $user->refererLink = $slug3;
            //$user->state = $request->state;
            $user->save();

            if ($user->save()) {
                $name = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
                $name = $user->name;
                $email = $user->email;
                $origPassword = $request->password;
                $userRole = $user->role;

                //send mail

                try {
                    Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!';
                }
            }

            $success_notification = array(
                'message' => 'User Created successfully!',
                'alert-type' => 'success'
            );

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $present_user = Auth::user();
                if ($present_user->role == 'seller') {
                    return redirect()->route('seller.dashboard')->with($success_notification);
                } else {
                    return Redirect::to(Session::get('url.intended'))->with($success_notification);
                }
            }

            return redirect()->intended('/');
        }
        //pay with GTPay
        $gtpay_mert_id        = 14435;
        $gtpay_tranx_id       = $this->gen_transaction_id();
        $gtpay_tranx_amt      = 1 * 100;
        $gtpay_tranx_curr     = 566;
        $gtpay_cust_id        = '1';
        $gtpay_tranx_noti_url = url('create_user');
        $gtpay_cust_name      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $slug3 . '{?#?#}' . $agent_Id . '{?#?#}' . $refererId . '{?#?#}' . $request->role;
        $gtpay_tranx_memo     = 'Mobow';
        $gtpay_echo_data      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $slug3 . '{?#?#}' . $agent_Id .  '{?#?#}' . $refererId . '{?#?#}' . $request->role;
        $gtpay_no_show_gtbank = 'yes';
        $gtpay_gway_name      = 'etranzact';
        $hashkey              = '6470B923CDDE833E02B4CA0329432E8BF29B62B29B6B722397924F40731D44D8324AFE100EE2A4B6BD1299606A7C46D6BF0FF95220C3065F02DC052E7BFE5283';
        $gtpay_hash           = $gtpay_mert_id . $gtpay_tranx_id . $gtpay_tranx_amt . $gtpay_tranx_curr . $gtpay_cust_id . $gtpay_tranx_noti_url . $hashkey;
        $hashed               = hash('sha512', $gtpay_hash);
        $gtPay_Data = [
            'gtpay_mert_id'        => $gtpay_mert_id,
            'gtpay_tranx_id'       => $gtpay_tranx_id,
            'gtpay_tranx_amt'      => $gtpay_tranx_amt,
            'gtpay_tranx_curr'     => $gtpay_tranx_curr,
            'gtpay_cust_id'        => $gtpay_cust_id,
            'gtpay_tranx_noti_url' => $gtpay_tranx_noti_url,
            'gtpay_cust_name'      => $gtpay_cust_name,
            'gtpay_tranx_memo'     => $gtpay_tranx_memo,
            'gtpay_echo_data'      => $gtpay_echo_data,
            'gtpay_no_show_gtbank' => $gtpay_no_show_gtbank,
            'gtpay_gway_name'      => $gtpay_gway_name,
            'hashkey'              => $hashkey,
            'hashed'               => $hashed
        ];

        return view('gttPayView', $gtPay_Data);
    }

    public function create_user(Request $request)
    {
        // if ($request->gtpay_tranx_amt != '1.00') {
        //     $transTable  = $request->gtpay_tranx_amt;
        // } else {
        //     session()->flash('fail', 'Incorect amount entered');

        //     return view('error_page');
        // }
        // if ($request->gtpay_tranx_curr != '566') {
        //     $transTable  = $request->gtpay_tranx_curr;

        //     session()->flash('fail', 'Incorect currency entered');

        //     return view('error_page');
        // }
        // if ($request->gtpay_mert_id != '14264') {
        //     $transTable  = $request->gtpay_mert_id;

        //     session()->flash('fail', 'Incorect merchant id entered');

        //     return view('error_page');
        // }
        // if ($request->gtpay_tranx_id != '14264') {
        //     $transTable  = $request->gtpay_tranx_id;

        //     session()->flash('fail', 'Incorect transaction id entered');

        //     return view('error_page');
        // }
        $returned_data = explode('{?#?#}', $request->gtpay_echo_data);
        $user              = new User;
        $user->name        = $returned_data[0];
        $user->email       = $returned_data[1];
        $user->password    = Hash::make($returned_data[2]);
        $user->refererLink = $returned_data[3];
        $user->idOfAgent   = $returned_data[4];
        // if($user->idOfAgent == '' || $user->idOfAgent == null) {
        //     $user->idOfAgent = null;
        // }
        $user->idOfReferer   = $returned_data[5];
        if ($user->idOfReferer == '' || $user->idOfReferer == null) {
            $user->idOfReferer = null;
        }
        $user->role        = $returned_data[6];
        if ($user->save()) {
            // Auth::login($user);
            Auth::attempt(['email' => $returned_data[1], 'password' => $returned_data[2]]);

            if (Auth::check()) {
                $present_user = Auth::user();
                // if referrer link is available, save it to referer table
                $link = new Refererlink();
                $link->user_id = $present_user->id;
                $link->refererlink = $present_user->refererLink;
                $link->save();

                $person_that_refered = $present_user->idOfReferer;
                if ($person_that_refered) {
                    $referer = User::where('id', $person_that_refered)->first();
                    if ($referer) {
                        $referer->refererAmount = $referer->refererAmount + 50;
                        $referer->save();
                    }
                }

                $agent_that_refered = $present_user->idOfAgent;
                if ($agent_that_refered) {
                    $referer2 = Agent::where('id', $agent_that_refered)->first();
                    if ($referer2) {
                        $referer2->refererAmount = $referer2->refererAmount + 100;
                        $referer2->save();
                    }
                }

                $person_that_refered = $present_user->idOfReferer;
                if ($person_that_refered) {
                    $referer = User::where('id', $person_that_refered)->first();
                    if ($referer) {

                        $person_that_refered2 = $referer->idOfReferer;
                        if ($person_that_refered2) {
                            $referer3 = User::where('id', $person_that_refered2)->first();
                            if ($referer3) {
                                $referer3->refererAmount = $referer3->refererAmount + 25;
                                $referer3->save();
                            }
                        }
                    }
                }

                $agent_that_refered = $present_user->idOfAgent;

                if ($agent_that_refered) {
                    $referer2 = Agent::where('id', $agent_that_refered)->first();
                    if ($referer2) {

                        $referer_parent = $referer2->idOfAgent;
                        if ($referer_parent) {
                            $the_referer_parent = Agent::where('id', $referer_parent)->first();
                            if ($the_referer_parent) {
                                $the_referer_parent->refererAmount = $the_referer_parent->refererAmount + 50;
                                $the_referer_parent->save();
                            }
                        }
                    }
                }



                if (Auth::user()->role == 'seller') {
                    return redirect()->route('seller.dashboard');
                } else if (Auth::user()->role == 'buyer') {
                    return  Redirect::to(Session::get('url.intended'));
                } else {
                    return redirect()->route('admin.dashboard');
                }
            }
            session()->flash('fail', ' Credential Incorect');
            return view('auth/login');
        }
    }








    public function createPaystackpay(Request $request)
    {
        return response()->json(['captcha' => 'trtr']);

        $link_from_url = $request->refer;
        $code_of_agent = $request->agent_code;

        $slug3 = Str::random(8);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'state' => ['string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'captcha' => 'required|captcha',
            'role' => 'required'
        ]);

        // Get id of owner of $link_from_url if available
        if ($link_from_url) {
            $saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
            $refererId = $saveIdOfRefree->id;
        } else {
            $refererId = null;
        }

        // Get id of owner of $agent code if available
        if ($code_of_agent) {
            $saveIdOfAgent = User::where('agent_code', $code_of_agent)->first();
            // dd($saveIdOfAgent);
            $agent_Id = $saveIdOfAgent->id;
        } else {
            $agent_Id = null;
        }

        //save user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        //save id of referer if user was reffererd
        $user->idOfReferer = $refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $agent_Id;
        $user->refererLink = $slug3;
        //$user->state = $request->state;
        $user->save();
        //send mail

        if ($user->save()) {
            $name = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name = $user->name;
            $email = $user->email;
            $origPassword = $request->password;
            $userRole = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }

        $success_notification = array(
            'message' => 'User Created successfully!',
            'alert-type' => 'success'
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $present_user = Auth::user();

            // if referrer link is available, save it to referer table
            $link = new Refererlink();
            $link->user_id = $present_user->id;
            $link->refererlink = $present_user->refererLink;
            $link->save();

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    $referer->refererAmount = $referer->refererAmount + 50;
                    $referer->save();
                }
            }

            $agent_that_refered = $present_user->idOfAgent;
            if ($agent_that_refered) {
                $referer = User::where('id', $agent_that_refered)->first();
                if ($referer) {
                    $referer->refererAmount = $referer->refererAmount + 100;
                    $referer->save();
                }
            }

            if ($present_user->role == 'seller') {
                return redirect()->route('seller.dashboard')->with($success_notification);
            } else {
                return Redirect::to(Session::get('url.intended'))->with($success_notification);
            }
        }

        return redirect()->intended('/');
    }


    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }

    public function showRegisterforRefer($refer)
    {
        $referlink = $refer;



        return view('auth/register', compact('referlink'));
    }



    public function showRegister(Request $request)
    {

        $request->session()->forget('url.intended');
        session(['url.intended' => url()->previous()]);

        $param = $request->input('invite');

        //$param = $request->query('param');
        if ($param) {
            $referParam = $param;
            // $ww = session()->get('message')
            $request->session()->put('current_param', $referParam);
        } else {
            $referParam = null;
        }

        $current_param = $request->session()->get('current_param');



        if ($current_param) {
            $referParam = $current_param;
        }

        $states = State::all();

        if (Auth::check()) {
            return redirect()->intended('/');
        }

        return view('auth/register', compact('states', 'referParam'));
    }

    public function showGroupRegister(Request $request)
    {
        return view('auth/group-registeration');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'string', 'min:6']

        ]);

        // $check_user = User::where('email', $request->email)first();
        // if (!$check_user) {
        // 	# code...
        // }


        // $validator = Validator::make($request->all(), [
        //     'email'    => ['required', 'string', 'email', 'max:255'],
        //     'password' => ['required', 'string', 'min:6']
        // ]);

        // if ($validator->fails()) {
        // 	  $success_notification = array(
        //         'message' => 'Unsuccessfull Request. Please Retry',
        //         'alert-type' => 'error'
        //     );
        // 	  return redirect('/')->with($success_notification)->withErrors($validator)->withInput();
        // }

        $remember_me  = (!empty($request->remember)) ? TRUE : FALSE;

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials, $remember_me)) {

            if (Auth::user()->role == 'seller') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('seller.dashboard')->with($success_notification);
            } else if (Auth::user()->role == 'buyer') {
                // session()->flash('success', ' Login Succesfull');
                // return redirect()->route('buyer.dashboard');
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );

                return Redirect::to(Session::get('url.intended'))->with($success_notification);
            } else if (Auth::user()->role == 'admin') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.dashboard')->with($success_notification);
            } else if (Auth::user()->role == 'superadmin') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('superadmin.dashboard')->with($success_notification);
            } else if (Auth::user()->role == 'cmo') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('cmo.dashboard')->with($success_notification);
            } elseif (Auth::user()->role == 'customerservice') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('customer_service.dashboard')->with($success_notification);
            } else if (Auth::user()->role == 'data') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('data.dashboard')->with($success_notification);
            } else if (Auth::user()->role == 'accountant') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('accountant.dashboard')->with($success_notification);
            } else {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('home')->with($success_notification);
            }
        }

        // $success_notification = array(
        //     'message' => 'Incorrect credentials! Try again.',
        //     'alert-type' => 'error'
        // );
        session()->flash('fail', 'The password entered is incorrect');

        return redirect()->route('login');
    }

    public function showLogin(Request $request)
    {
        $request->session()->forget('url.intended');
        session(['url.intended' => url()->previous()]);

        if (Auth::check()) {
            return view('welcome');
        }
        return view('auth/login');
    }

    public function addSlug()
    {
        $buyers = User::where('slug', null)->get();
        foreach ($buyers as $buyer) {
            $random = Str::random(3);
            $slug = Str::of($buyer->name)->slug('-') . '' . $random;
            $buyer->slug = $slug;
            $buyer->save();
        }

        // Category::orderBy('id', 'asc')->paginate(35);
        return redirect()->route('home');
    }

    public function addSlug4Agents()
    {
        $agents = Agent::where('slug', null)->get();
        foreach ($agents as $agent) {
            // $random = Str::random(3);
            // $slug = Str::of($buyer->name)->slug('-').''.$random;
            $buyer->slug = $this->createSlug($request->name, new Agent());
            $buyer->save();
        }

        // Category::orderBy('id', 'asc')->paginate(35);
        return redirect()->route('home');
    }

    public function updateProfile(Request $request, $id)
    {

        $user = User::find($id);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'state' => ['string'],
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image set up
        if ($request->hasFile('file')) {
            $image_name = Str::of($request->name)->slug('-') . '-' . time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads/users'), $image_name);
            $user->image = $image_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;

        if ($user->save()) {
            $success_notification = array(
                'message' => 'Profile successfully updated!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }

        $success_notification = array(
            'message' => 'Profile could not be updated! Try again',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($success_notification);
    }



    public function update_Profile_4_agent(Request $request, $id)
    {

        $user = Agent::find($id);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'state' => ['string'],
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image set up
        if ($request->hasFile('file')) {
            $image_name = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $image_name);
            $user->image = $image_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        // $user->about = $request->about;

        if ($user->save()) {
            $success_notification = array(
                'message' => 'Profile successfully updated!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }

        $success_notification = array(
            'message' => 'Profile could not be updated! Try again',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($success_notification);
    }

    public function update_Password_4_Agent(Request $request, $id)
    {

        $user = Agent::find($id);
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $hashedPassword = Auth::guard('agent')->user()->password;
        // Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password]);

        if (Hash::check($request->old_password, $hashedPassword)) {
            // Authentication passed...
            $user->password = Hash::make($request->new_password);
            $user->save();

            $success_notification = array(
                'message' => 'Password successfully changed!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        } else {
            $success_notification = array(
                'message' => 'Password could not be updated!! Try again',
                'alert-type' => 'error'
            );
            return redirect()->route('agent.dashboard')->with($success_notification);
            // return redirect()->back()->with($success_notification);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        $password = $user->password;
        $validatedData = $request->validate([
            'new_password' => ['required', 'string', 'min:6'],
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            $success_notification = array(
                'message' => 'Password successfully changed!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        } else {
            $success_notification = array(
                'message' => 'Password could not be updated!! Try again',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($success_notification);
        }
    }



    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'bank_name' => ['required', 'string'],
            'account_name' => ['required', 'string'],
            'account_number' => ['required', 'numeric'],
        ]);

        $user->bank_name = $request->bank_name;
        $user->account_name = $request->account_name;
        $user->account_number = $request->account_number;

        if ($user->save()) {
            $success_notification = array(
                'message' => 'Account details successfully updated!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($success_notification);
        }

        $success_notification = array(
            'message' => 'Account details could not be updated!! Try again',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($success_notification);
    }

    public function loginformail(Request $request)

    {

        if (Auth::user()->email_verified_at == null) {
            return redirect()->intended('/email/verify');
        }
        //$credentials = $request->only('email', 'password');

        //if (Auth::attempt($credentials)) {
        if (Auth::user()->role == 'seller') {
            $success_notification = array(
                'message' => 'You are successfully logged in!',
                'alert-type' => 'success'
            );
            return redirect()->route('seller.dashboard')->with($success_notification);
        } else if (Auth::user()->role == 'buyer') {
            // return redirect()->route('buyer.dashboard');
            $success_notification = array(
                'message' => 'You are successfully logged in!',
                'alert-type' => 'success'
            );
            return Redirect::to(Session::get('url.intended'))->with($success_notification);
        } else {
            return redirect()->route('admin.dashboard');
        }
        //}
        $success_notification = array(
            'message' => 'Incorrect credentials! Try again.',
            'alert-type' => 'error'
        );
        return view('auth/login')->with($success_notification);
    }




    // $link = new Refererlink();
    // $link->user_id = $present_user->id;
    // $link->refererlink = $present_user->refererLink;
    // $link->save();

    // $person_that_refered = $present_user->idOfReferer;
    // if($person_that_refered){
    // 	$referer = User::where('id', $person_that_refered)->first();
    // 	if ($referer) {
    // 		$referer->refererAmount = $referer->refererAmount + 50;
    // 		$referer->save();
    // 	}
    // }

    // $agent_that_refered = $present_user->idOfAgent;
    // if($agent_that_refered){
    // 	$referer = User::where('id', $agent_that_refered)->first();
    // 	if ($referer) {
    // 		$referer->refererAmount = $referer->refererAmount + 100;
    // 		$referer->save();
    // 	}
    // }

    // if ( $present_user->role == 'seller' ){
    // 	return redirect()->route('seller.dashboard');
    // } else {
    // 	return Redirect::to(Session::get('url.intended'));
    // }



    // public function save_new_referer_link_for_user(Request $request)
    // {
    //     $present_user = Auth::user();
    //     // if referrer link is available, save it to referer table

    //     $link = new Refererlink();
    //     $link->user_id = $present_user->id;
    //     $link->refererlink = $present_user->refererLink;
    //     $link->save();

    //     $link_from_url = $request->refer;
    //     $code_of_agent = $request->agent_code;

    //     $slug3 = Str::random(8);

    //     if ($link_from_url) {
    //         $saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
    //         $refererId = $saveIdOfRefree->id;
    //     } else {
    //         $refererId = null;
    //     }

    //     if ($code_of_agent) {
    //         $saveIdOfAgent = User::where('agent_code', $code_of_agent)->first();
    //         $agent_Id = $saveIdOfAgent->id;
    //     } else {
    //         $agent_Id = null;
    //     }

    //     $request->validate([
    //         'name'     => ['required', 'string', 'max:255'],
    //         'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //         'role'     => ['required', Rule::in(['seller', 'buyer']),]
    //     ]);


    //     //save user
    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->role = $request->role;
    //     //save id of referer if user was reffererd
    //     $user->idOfReferer = $refererId;
    //     //save id of agent if user was brought by agent
    //     $user->idOfAgent = $agent_Id;
    //     $user->refererLink = $slug3;
    //     //$user->state = $request->state;
    //     $user->save();
    //     //send mail

    //     if ($user->save()) {
    //         $name = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
    //         $name = $user->name;
    //         $email = $user->email;
    //         $origPassword = $request->password;
    //         $userRole = $user->role;

    //         try {
    //             Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
    //         } catch (\Exception $e) {
    //             $failedtosendmail = 'Failed to Mail!';
    //         }
    //     }

    //     $success_notification = array(
    //         'message' => 'User Created successfully!',
    //         'alert-type' => 'success'
    //     );

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $present_user = Auth::user();
    //         // if referrer link is available, save it to referer table

    //         $link = new Refererlink();
    //         $link->user_id = $present_user->id;
    //         $link->refererlink = $present_user->refererLink;
    //         $link->save();

    //         $person_that_refered = $present_user->idOfReferer;
    //         if ($person_that_refered) {
    //             $referer = User::where('id', $person_that_refered)->first();
    //             if ($referer) {
    //                 $referer->refererAmount = $referer->refererAmount + 50;
    //                 $referer->save();
    //             }
    //         }

    //         $agent_that_refered = $present_user->idOfAgent;
    //         if ($agent_that_refered) {
    //             $referer = User::where('id', $agent_that_refered)->first();
    //             if ($referer) {
    //                 $referer->refererAmount = $referer->refererAmount + 100;
    //                 $referer->save();
    //             }
    //         }

    //         if ($present_user->role == 'seller') {
    //             return redirect()->route('seller.dashboard')->with($success_notification);
    //         } else {
    //             return Redirect::to(Session::get('url.intended'))->with($success_notification);
    //         }
    //     }

    //     return redirect()->intended('/');
    // }


}
