<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\OrderProperty;

class OrderPropertyRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */

    public function rules()
    {
        $id = '';
        if ($this->get('code')) {
            $orderProperty = OrderProperty::findByCode($this->get('code'))->first();
            if ($orderProperty) {
                $id = ','.$orderProperty->id;
            }
        }
        return [
            'name' => 'required',
            'code' => 'required|unique:blog,code'.$id
        ];
    }

}
