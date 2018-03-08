<?php

namespace App\Http\Controllers\Consumer;
use App\Model\Consumer;
use App\Model\Group;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class consumerController extends Controller
{
    public function index()
    {
        $ObjConsumer = new Consumer();
        $consumer = $ObjConsumer->paginate(5);
        $consumerLogin = $ObjConsumer->orderBy('login')->paginate(5);
        $consumerEmail = $ObjConsumer->orderBy('email')->paginate(5);
        $consumerGroup = $ObjConsumer->orderBy('groupId')->paginate(5);
        return view('consumer.index', ['consumers' => $consumer, 'consumerLogin'=>$consumerLogin,
            'consumerEmail'=>$consumerEmail, 'consumerGroup'=>$consumerGroup]);
    }
    public function addConsumer()
    {
        $objGroup = new Group();
        $group = $objGroup->get();

        return view('consumer.add', ['group' => $group]);
    }

    public function addrequestConsumer(Request $request)
    {
        $ObjConsumer = new Consumer();
        $password = md5($request->input('password'));
        $ObjConsumer = $ObjConsumer->create([
            'groupId' => $request->get('groupId'),
            'login' => $request->input('login'),
            'password' => $password,
            'email' => $request->input('email')
        ]);
        if ($ObjConsumer) {
            return redirect()->route('consumer')->with('success');
        }
        return back()->with('error');
    }

    public function editConsumer($consumerId){
        $consumer = consumer::find($consumerId);
        $objGroup = new Group();
        $group = $objGroup->get();
        return view('consumer.edit', ['consumer'=>$consumer, 'group'=>$group]);
    }
    public function editRequestConsumer(Request $request, $consumerId){
        try {
            $ObjConsumer = Consumer::find($consumerId);
            if(!$ObjConsumer){
                abort(404);
            }
            $password = md5($request->input('password'));
            $ObjConsumer->groupId = $request->get('groupId');
            $ObjConsumer->login = $request->input('login');
            $ObjConsumer->password = $password;
            $ObjConsumer->email = $request->input('email');
            if ($ObjConsumer->save()) {
                return redirect()->route('consumer')->with('success');
            }
            return back()->with('error');
            dd($request->all());
        }catch (ValidationException $e){
            \Log::error($e->getMessage());
            return back()->with('error', '$e->getMessage()');
        }
    }
    public function deleteConsumer(Request $request){
        if($request->ajax()){
            $id = (int)$request-> input('id');
            $ObjConsumer = new Consumer();
            try {
                $ObjConsumer->where('consumerId', $id)->delete();
                echo 'success';
            } catch (\Exception $e) {
                echo 'error';
            }

        }
    }
}