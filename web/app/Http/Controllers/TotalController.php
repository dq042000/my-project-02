<?php

namespace App\Http\Controllers;

use App\Models\Total;
use Illuminate\Http\Request;

class TotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $total = Total::first();
        $cols = ['進站總人數'];
        $rows = [
            [
                'tag' => '',
                'text' => $total->total,
            ],
            [
                'tag' => 'button',
                'type' => 'button',
                'btn_color' => 'btn-info',
                'action' => 'edit',
                'id' => $total->id,
                'text' => '編輯',
            ],
        ];
        $this->view['header'] = '進站人數管理';
        $this->view['module'] = 'Total';
        $this->view['cols'] = $cols;
        $this->view['rows'] = $rows;
        return view('backend.module', $this->view);
    }

    public function edit($id)
    {
        //
        $total = Total::find($id);
        $view = [
            'action' => '/admin/total/' . $id,
            'method' => 'patch',
            'modal_header' => '編輯進站總人數',
            'modal_body' => [
                [
                    'label' => '進站總人數',
                    'tag' => 'input',
                    'type' => 'number',
                    'name' => 'total',
                    'value' => $total->total,
                ],
            ],
        ];
        return view('modals.base_modal', $view);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $total = Total::find($id);
        if ($total->total != $request->input('total')) {
            $total->total = $request->input('total');
            $total->save();
        }
        return redirect('/admin/total');
    }
}