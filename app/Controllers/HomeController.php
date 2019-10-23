<?php
/*
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 *
 * ---------------------------------------------------------------------------------------------------------------
 */

namespace app\Controllers;

// package untuk class HomeController

use app\Core\Controller; // alias namespace

// Controller class system
class HomeController extends Controller

{
    // method default
    // all class use methos index for method default
    // framework chatomz

    public function index()
    {
        $data['dpt']    = $this->model('hakpilih')->readdpt();
        $data['dptb']   = $this->model('hakpilih')->readdptb();
        $data['dpk']    = $this->model('hakpilih')->readdpk();
        $data['total']  = $this->model('hakpilih')->total();
        $data['surat']  = $this->model('suratsuara')->readsuratsuara();
        $data['pemilih']= $this->model('pemilih')->readpemilih();
        $data['totalpemilih'] = $this->model('pemilih')->totalpemilih();
        $data['warna']  = ['secondary','warning','danger','primary','success'];
        $this->view->landing('Administrator/beranda',$data);
    }

    public function tambahdata($value='')
    {
        $this->model('hakpilih')->createhakpilih();
        $this->redirect('home');
    }

    public function prosessurat($value='')
    {
        $this->model('suratsuara')->updatesuratsuara();
        $this->redirect('home');
    }

    public function prosespemilih($value='')
    {
        $this->model('pemilih')->updatepemilih();
        $this->redirect('home');
    }
}
