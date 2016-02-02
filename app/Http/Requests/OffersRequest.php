<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Offer;

class OffersRequest extends Request {

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
            $article = Offer::findByCode($this->get('code'))->first();
            if ($article) {
                $id = ','.$article->id;
            }
        }
        return [
            'name' => 'required',
            'preview_picture' => 'mimes:jpeg,png,jpg',
            'code' => 'required|unique:blog,code'.$id
        ];
    }

}
