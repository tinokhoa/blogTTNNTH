<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatdongsanRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ten_bds' => 'required',
            'tieu_de' => 'required',
            'id_loaidanhmuc' => 'required',
            'dientich' => 'required',
            'gia' => 'required',
            'gia_dukien' => 'required',
            'noidung' => 'required',
            'id_chudautu' => 'required',
            'dientich_nha' => 'required',
            'dientich_dat' => 'required',
            'diadiem' => 'required',
            'id_huyen' => 'required',
            'phongngu' => 'required',
            'nhavesinh' => 'required',
            'ham_dexe' => 'required',
            'sotang' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tenbds.required' => 'Không thể để trống tên bất động sản !',
            'tieude.required' => 'Không thể để trống tiêu đề !',
            'idloaidanhmuc.required' => 'Không thể để trống loại danh mục !',
            'dientich.required' => 'Không thể để trống diện tích !',
            'gia.required' => 'Không thể để trống giá',
            'giadukien.required' => 'Không thể để trống giá dự kiến',
            'noidung.required' => 'Không thể để trống nội dung !',
            'idchudautu.required' => 'Không thể để trống chủ đầu tư',
            'dientichnha.required' => 'Không thể để trống diện tích nhà',
            'dientichdat.required' => 'Không thể để trống diện tích đất',
            'diadiem.required' => 'Không thể để trống địa chỉ ',
            'idhuyen.required' => 'Không thể để trống',
            'phongngu.required' => 'Không thể để trống',
            'nhavesinh.required' => 'Không thể để trống',
            'hamdexe.required' => 'Không thể để trống',
            'sotang.required' => 'Không thể để trống'
        ];
    }
}
