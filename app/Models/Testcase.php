<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Testcase extends Model
{
    use HasFactory;

    protected $table = "testcase";

    /**
     * @param array $attributes
     * @return Testcase
     */
    public function createTestcase(array $attributes)
    {
        $testcase = new self();
        $testcase->title = $attributes["title"];
        $testcase->content = $attributes["content"];
        $testcase->save();

        return $testcase;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getTestcase(int $id)
    {
        $testcase = $this->where("id", $id)->first();
        
        return $testcase;
    }

    /**
     * @return Testcase[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getsTestcase()
    {
        $testcases = $this::all();

        return $testcases; 
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function updateTestcase(int $id, array $attributes)
    {
        $testcase = $this->getTestcase($id);

        if($testcase == null) {
            throw new ModelNotFoundException("Not found");
        }

        $testcase->title = $attributes["title"];
        $testcase->content = $attributes["content"];
        $testcase->save();

        return $testcase;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteTestcase(int $id)
    {
        $testcase = $this->getTestcase($id);

        if($testcase == null) {
            throw new ModelNotFoundException("Item not found");
        }

        return $testcase->delete();
    }
}
