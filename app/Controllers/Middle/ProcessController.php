<?php
/**
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

namespace app\Controllers\Middle; // package untuk class HomeController


use app\Core\Controller;
use app\Models\Resources\Db;


// Controller class system
class ProcessController extends Controller
{
	public function delete($table)
	{
		$id 	= $_POST['id'];
		return Db::delete($table,$id);
	}
}