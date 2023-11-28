<?php
namespace App\Services;

class CommonService{
    /**
     * Fungsi untuk mengambil query yang sering digunakan
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi data query yang akan diambil
     * @return array Associative array yang berisi data query yang berhasil diambil
     */
    public function getQuery($request){
        $perPage = (int) $request->input("per_page", 10);
        $page = (int) $request->input("page", 1);
        $order = $request->input("order", "created_at");
        $sort = $request->input("sort", "desc");
        $value = $request->input("value");

        return [
            "perPage" => $perPage,
            "page" => $page,
            "order" => $order,
            "sort" => $sort,
            "value" => $value,
        ];
    }

    /**
     * Fungsi untuk mengubah output dari model eloquent menjadi array
     *
     * @param \Illuminate\Database\Eloquent\Collection $getData Output dari model eloquent
     * @return array Array yang berisi data dari `$getTenant`
     */
    public function toArray($getData){
        $dataArr = [];
        foreach($getData as $dataObj){
            array_push($dataArr, $dataObj);
        }

        return $dataArr;
    }

    /**
     * Fungsi untuk mengambil data yang belum dihapus berdasarkan `$id` yang diberikan.
     *
     * @param string $modelPath Path ke model yang akan digunakan untuk mengambil data
     * @param mixed $id Id dari data yang akan diambil
     * @return array Associative array yang berisi data query yang berhasil diambil
     */
    public function getDataById(string $modelPath, $id){
        $model = new $modelPath;
        $getData = $model::where("id", $id)->where("deleted_at", null)->first();
        return $getData;
    }
}
