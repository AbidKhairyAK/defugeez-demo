<?php

namespace App\Http\Presenter;

use Laracasts\Presenter\Presenter;

class DemandPresenter extends Presenter
{
	public function dateFormatted()
	{
		$date = date('d-m-Y', strtotime($this->created_at));
		return $date;
	}

	public function statusFormatted()
	{
		$status = $this->status ? '&#10004;' : '<b>-</b>';
		return $status;
	}
}