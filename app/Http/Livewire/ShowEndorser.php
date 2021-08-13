<?php

namespace App\Http\Livewire;

use App\Models\Bloodline;
use App\Models\BloodlineImage;
use App\models\NationalVideo;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEndorser extends Component
{
    use WithPagination;

    public $category = 0;
    public $genID = null;
    public $description = null;
    public $national;
    public $bloodlines;
    public $vidID = null;

    protected $photos;
    protected $videos;

    public function mount()
    {
        $this->bloodlines = $this->national->bloodlines;
        $this->videos = $this->national->videos;
    }

    public function updatePhotos($genID)
    {
        $this->resetPage();
        $this->genID = $genID;
        $this->description = $this->bloodlines->where('id', $genID)->first()->description;
    }

    public function updateVideos($vidID)
    {
        $this->resetPage();
        $this->vidID = $vidID;
    }

    public function updateCategory($category)
    {
        $this->resetPage();
        $this->genID = null;
        $this->vidID = null;
        $this->description = null;
        $this->category = $category;
    }

    public function render()
    {
        $this->photos = is_null($this->genID) ? BloodlineImage::where('national_id',$this->national->id)->paginate(4) : BloodlineImage::where('bloodline_id',$this->genID)->paginate(4);
        $this->videos = is_null($this->vidID) ? NationalVideo::where('national_id',$this->national->id)->get() : NationalVideo::where('national_id',$this->national->id)->where('category',$this->vidID)->get() ;
        
        return view('livewire.show-endorser', [
            'photos' => $this->photos,
            'videos' => $this->videos,
        ]);
    }
}
