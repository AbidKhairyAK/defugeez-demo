<?php

namespace App\Http\Presenter;

use Laracasts\Presenter\Presenter;

class OrganizationPresenter extends Presenter
{
	public function fullAddress()
	{
		$address = '-';
		if ($this->village_id) {
			$address = $this->address.', '.$this->village->name.', '.$this->district->name.', '.$this->regency->name.', '.$this->province->name;
		}

		return $address;
	}

	public function halfAddress()
	{
		$address = '-';
		if ($this->village_id) {
			$address = $this->regency->name.', '.$this->province->name;
		}

		return $address;
	}
}