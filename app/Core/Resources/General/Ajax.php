<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 */

// -------------------------------------------------------------------------------------------------

namespace app\Core\Resources\General;

// -------------------------------------------------------------------------------------------------

/**
 * FUNCTION OF AJAX JQUERY
 */
class Ajax
{
	private $selectid 		= '#edit';

	public function modal_Edit($url,$title='Edit Data')
	{
		$url 	= site_url($url);
		$html = "<script>
							$(document).ready(function(){
					    $('".$this->selectid."').on('show.bs.modal', function (e) {
					        var rowid = $(e.relatedTarget).data('id');
					        //menggunakan fungsi ajax untuk pengambilan data
					        $.ajax({
					            type : 'post',
					            url : '".$url."',
					            data :  'id='+ rowid,
					            success : function(data){
					            $('.fetched-data').html(data);//menampilkan data ke dalam modal
					            }
					        });
					     });
					});
					</script>

					<div class='modal fade' id='edit' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog' role='document'>
					    <div class='modal-content'>
					      <div class='modal-header'>
					        <h5 class='modal-title' id='exampleModalLabel'>".$title."</h5>
					        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					          <span aria-hidden='true'>&times;</span>
					        </button>
					      </div>
					      <div class='modal-body'>
					        <div class='fetched-data'></div>
					      </div>
					    </div>
					  </div>
					</div>";
		return $html;
	}
}