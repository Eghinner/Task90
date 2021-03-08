<?php 
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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
              return redirect('home')->with('Message','Bienvenido, Usuario');
        }else{
            return redirect('login')->with('Message','Invalid credentials');
        }
    }
//////////////////SIGNUP////////
    public function show_signup_form()
    {
//        $client = new Client([
//          'base_uri' => 'https://api.quotable.io/random',
//          'timeout' => 20.0,
//        ]);
//        $response = $client->request('GET','random');
//        $random = json_decode( $response->getBody()->getContents() );
        return view('register'
          //,compact('random')
                   );
    }
    public function process_signup(Request $request)
    {   
$request->validate([
  
    'name' => ['required','unique:users,name'],  
    'firstname' => ['required','string'], 
    'lastname' => ['required','string'], 
//'regex:/[a-z]?/',
//'regex:/[A-Z]?/',
//'regex:/[0-9]?/',
//'regex:/^([*\/-_&%#$@]*)*$/',
//'name' => 'required|string|regex:/[a-z]?/|regex:/[A-Z]?/|regex:/[0-9]?/|regex:/^([*\/-_&%#$@]*)*$/',
   'email' => ['required','email','unique:users,email'],
   'password' => ['required','min:8','regex:/[a-z]?/','regex:/[A-Z]?/','regex:/[0-9]?/','regex:/([*\-_&%#$@])/'],
   'password2' => ['required_with:password','same:password','min:8'],
   'quote' => ['required']
]);

if ($request->hasFile('foto')) {

   $request->validate([     
	'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
   	]);
   $request->foto->store('uploads','public');

    $user = User::create([
    'name' => ($request->get('name')),
    'firstname' => ($request->get('firstname')),
    'lastname' => ($request->get('lastname')),
    'email' => strtolower($request->input('email')),
    'password' => bcrypt($request->input('password')),
    'quote' => ($request->get('quote')),
    'foto' => $request->foto->hashName()
                        ]);                 
    $user->save();
      
    return redirect('login')->with('Message','Usuario agregado');
    }
}
   public function logout(Request $request)
  {
    //   Auth::logout();
       $request->session()->invalidate();
    //   Session::flush();
       $request->session()->regenerateToken();
        return redirect('home')->with('Ciao');
   }
  
 }