<?php 
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
class LoginController extends Controller
{  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
//////////////LOGIN/////////////
    public function show_login_form()
    {
        return view('login');
    }
    public function process_login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('name',$request->name)->first();

        if (auth()->attempt($credentials)) {

            return redirect('login')->with('Bienvenido, Usuario');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
  

//////////////////SIGNUP////////
    public function show_signup_form()
    {
        $client = new Client([
          'base_uri' => 'https://api.quotable.io/random',
          'timeout' => 20.0,
        ]);
        $response = $client->request('GET','random');

        $random = json_decode( $response->getBody()->getContents() );
        return view('register',compact('random'));
    }
    public function process_signup(Request $request)
    {   
$request->validate([
    'name' => 'required',
    'email' => 'required',
    'password' => 'required',
    'quote' => 'required',
]);  
if ($request->hasFile('foto')) {

   $request->validate([     
	'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
   	]);
   $request->foto->store('uploads','public');


        $user = User::create([
  //      $user = new User([
//                    'name' => trim($request->input('name')),
        	'name' => ($request->get('name')),
                    'email' => strtolower($request->input('email')),
                    'password' => bcrypt($request->input('password')),
                    'quote' => ($request->get('quote')),
        	'foto' => $request->foto->hashName()
                ]);               
  
        $user->save();

  
//       	return $user;       
       return redirect('login')->with('Message','Usuario agregado');
    }
}
   public function logout()
  {
       Auth::logout();
      // $request->session()->invalidate();
       Session::flush();
      // $request->session()->regenerateToken();
        return redirect('login')->with('Ciao');
   }
  
 }