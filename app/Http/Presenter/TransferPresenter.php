<?php

namespace App\Http\Presenter;

use Laracasts\Presenter\Presenter;

class TransferPresenter extends Presenter
{
	public function amount_formatted()
	{
		$amount = substr_replace($this->amount, '000', -3);
		$format = 'Rp '.number_format($amount, 0, ',', '.');

		return $format;
	}

	public function amount_real()
	{
		$format = 'Rp '.number_format($this->amount, 0, ',', '.');

		return $format;
	}

	public function unique_code()
	{
		$amount = substr($this->amount, -3);

		return $amount;
	}

	public function date_formatted()
	{
		$format = $this->created_at->format('d F Y');

		return $format;
	}

	public function due_date()
	{
		$format = $this->created_at->addDays(2)->format('d F Y H:i');

		return $format;
	}

	public function bank_number()
	{
		$banks = [
			'BCA' => config('bank.bca'),
			'BRI' => config('bank.bri'),
			'BNI' => config('bank.bni'),
			'MANDIRI' => config('bank.mandiri'),
			'OTHER' => config('bank.other')
		];

		return $banks[$this->bank];
	}

	public function curr_status()
	{
		$status = [
			'status' => 'not',
			'color' => 'secondary',
			'text' => 'belum terbukti',
		];

		if ($this->status) {
			$status['status'] = 'approved';
			$status['color'] = 'success';
			$status['text'] = 'terbukti';
		} else if ($this->proof) {
			$status['status'] = 'wait';
			$status['color'] = 'warning';
			$status['text'] = 'menunggu persetujuan';
		}

		return $status;
	}
}