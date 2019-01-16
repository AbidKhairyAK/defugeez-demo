<?php

namespace App\Http\Presenter;

use Laracasts\Presenter\Presenter;

class RefugeePresenter extends Presenter
{
	public function dateFormatted()
	{
		$date = date('d-m-Y', strtotime($this->created_at));
		return $date;
	}
}