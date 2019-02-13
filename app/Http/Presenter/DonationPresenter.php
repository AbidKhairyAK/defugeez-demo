<?php

namespace App\Http\Presenter;

use Laracasts\Presenter\Presenter;
use App\Model\Transfer;

class DonationPresenter extends Presenter
{
	public function percentage()
	{
		$collected = Transfer::withTrashed()->where([
			['donation_id', $this->id],
			['status', 1],
		])->sum('amount');
		$percentage = $collected / $this->target * 100;

		return round($percentage);
	}

	public function collected()
	{
		$data = Transfer::withTrashed()->where([
			['donation_id', $this->id],
			['status', 1],
		])->sum('amount');
		$collected = substr_replace($data, '000', -3);
		$format = 'Rp '.number_format($collected, 0, ',', '.');

		return $format;
	}

	public function targeted()
	{
		$format = 'Rp '.number_format($this->target, 0, ',', '.');

		return $format;
	}

	public function date_formatted()
	{
		$format = $this->created_at->format('d F Y');

		return $format;
	}
}