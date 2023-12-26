<?php

namespace App\Http\Controllers\Api;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use Carbon\Carbon;
    use Validator;
    use App\Traits;
class AuthController extends Controller
{
    use imagesTrait;

    public $credentials ;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register','verifyCode']]);
    }

    public function register(Request $request){
            
        $validator = Validator::make($request->all(), [
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
            'phone'      => ['required', 'unique:users'],
            'birthday'   => ['required'],
            'image'   => ['required'],
        ]);
        $personal_image = $this->save_image($request->image,'/images/photo');
        return  $personal_image ;
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user =  User::create([
            'name'             => $request['name'],
            'email'            => $request['email'],
            'phone'            => $request['phone'],
            'password'         => Hash::make($request['password']),
            'status'           => '0',
            'type'             => $request->type,
            'birthday'          => $request->address,
            'email_permission' => '1',
            'image' => $personal_image
        ]);
        
        return response()->json([
            'message' => 'please cheak your account',
            'user' => $user
        ], 200);

    }
    
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        $token = auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
    
    protected function respondWithToken($token){
    
        return response()->json([
            'status_code'=> 200, 
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 300,
                'user' => auth('api')->user()
            ]
            
        ],200);
    }  

    public function refresh() {
        return  $this->respondWithToken(auth()->refresh());
    }

    public function logout(){
        auth()->logout();

        return response()->json(['message' => 'logout successfully']);
    }


}
