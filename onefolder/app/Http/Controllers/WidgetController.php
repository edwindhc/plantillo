<?php
namespace App\Http\Controllers;

use App\Widget;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
{
    public $viewDir = "widget";

    public function __construct() {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $records = Widget::findRequested();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, Widget::validationRules());

        Widget::create($request->all());

        return redirect('/widget');
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Widget $widget)
    {
        return $this->view("show",['widget' => $widget]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Widget $widget)
    {
        return $this->view( "edit", ['widget' => $widget] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Widget $widget)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Widget::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $widget->update($data);
            return "Record updated";
        }

        $this->validate($request, Widget::validationRules());

        $widget->update($request->all());

        return redirect('/widget');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Widget $widget)
    {
        $widget->delete();
        return redirect('/widget');
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
