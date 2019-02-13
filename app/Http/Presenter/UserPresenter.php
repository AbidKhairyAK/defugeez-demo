<?php

namespace App\Http\Presenter;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
	public function dateFormatted()
	{
		$date = date('d-m-Y', strtotime($this->created_at));
		return $date;
	}

	public function roleFormatted()
	{
		$status = [1 => 'Developer', 'Admin', 'Relawan', 'Akun Biasa'];
		return $status[$this->role];
	}

	public function statusFormatted()
	{
		$color = $this->status ? 'success' : 'danger';
		$name = $this->status ? 'Aktif' : 'Nonaktif';
		$label = '<span class="badge badge-'.$color.'">'.$name.'</span>';

		return $label;
	}

	public function fullAddress()
	{
		$address = $this->address ? $this->address.', '.$this->village->name.', '.$this->district->name.', '.$this->regency->name.', '.$this->province->name : '-';

		return $address;
	}
}