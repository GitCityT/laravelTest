<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Custom;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Requests\CustomRequest;
use App\Rules\LowerCase;
class CustomController extends Controller
{
	public function __construct(){
		$this->middleware('test');//测试中间件，只允许名为Test的用户访问该控制器
	}
	public function index(){
		return redirect('admin/custom/search');
	}

	public function search(Request $request){
		$para=[];
		$customs=Custom::where(function($query) use($request,&$para) {
			$name=$request['name'];
            if($name !== null)
            {
            	$para['name']=$name;
                $query->where('name', 'like', "%$name%");
            }
        })->orderBy('id','desc')->paginate(10);
		return view('custom.index',[
			'title'=>'Custom Manage',
			'customs'=>$customs,
			'para'=>$para
		]);
	}

	public function create(){
		return view('custom.add',[
			'title'=>'Add Custom'
		]);
	}

	public function store(CustomRequest $request){
		$validator = $request->validated();
		$custom=new Custom();
		$custom->name = $validator['name'];
		if($custom->save())
			return redirect()->route('custom.index');
		else
			return $this->create();
	}

	public function edit($id){
		$custom=Custom::select('id','name')->find($id);
		return view('custom.edit',[
			'title'=>'Edit Custom',
			'custom'=>$custom
		]);
	}

	public function update(Request $request,$id){
		$validator = $request->validated();
		$custom=[
			'name'=>$validator【'name']
		];
		if(Custom::where('id',$id)->update($custom))
			return redirect()->route('custom.index');
		else
			return redirect()->route('custom.edit',['id'=>$id]);
	}
	public function destroy($id){
		// dd(Custom::find($id)->delete());
		if(Custom::destroy($id))
			$arr=['type'=>'success','content'=>'delete sucess!'];
		else
			$arr=['type'=>'warning','content'=>'data not exist!'];
		return response()->json($arr);
	}
}
