<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Template;
class TemplateController extends Controller {

	public function getIndex()
	{
		$list_template = Template::all();
		return view('izin.template.index',['list_template'=>$list_template]);
	}
}
