<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function assignRandomImage()
    {
        $usedImages = Restaurant::pluck('image')->toArray(); // get all used images
        $availableImages = array_diff($this->getAvailableImages(), $usedImages); // get available images
        if (count($availableImages) > 0) {
            $this->image = $availableImages[array_rand($availableImages)];
            $this->save();
        }
    }

    private function getAvailableImages()
    {
        return ['image (1).jpg',    'image (2).jpg',    'image (3).jpg',    'image (4).jpg',    'image (5).jpg',    'image (6).jpg',    'image (7).jpg',    'image (8).jpg',    'image (9).jpg',    'image (10).jpg',    'image (11).jpg',    'image (12).jpg',    'image (13).jpg',    'image (14).jpg',    'image (15).jpg',    'image (16).jpg',    'image (17).jpg',    'image (18).jpg',    'image (19).jpg',    'image (20).jpg',    'image (21).jpg',    'image (22).jpg',    'image (23).jpg',    'image (24).jpg',    'image (25).jpg',    'image (26).jpg',    'image (27).jpg',    'image (28).jpg',    'image (29).jpg',    'image (30).jpg',    'image (31).jpg',    'image (32).jpg',    'image (33).jpg',    'image (34).jpg',    'image (35).jpg',    'image (36).jpg',    'image (37).jpg',    'image (38).jpg',    'image (39).jpg',    'image (40).jpg',    'image (41).jpg',    'image (42).jpg',    'image (43).jpg',    'image (44).jpg',    'image (45).jpg',    'image (46).jpg',    'image (47).jpg',    'image (48).jpg',    'image (49).jpg',    'image (50).jpg',    'image (51).jpg',    'image (52).jpg',    'image (53).jpg',    'image (54).jpg',    'image (55).jpg',    'image (56).jpg',    'image (57).jpg',    'image (58).jpg',    'image (59).jpg',    'image (60).jpg',    'image (61).jpg',    'image (62).jpg',    'image (63).jpg',    'image (64).jpg',    'image (65).jpg',    'image (66).jpg',    'image (67).jpg',    'image (68).jpg',    'image (69).jpg',    'image (70).jpg',    'image (71).jpg',    'image (72).jpg',    'image (73).jpg',    'image (74).jpg',    'image (75).jpg',    'image (76).jpg',    'image (77).jpg',    'image (78).jpg',    'image (79).jpg',    'image (80).jpg',    'image (81).jpg',    'image (82).jpg',    'image (83).jpg',    'image (84).jpg',    'image (85).jpg',    'image (86).jpg'];
    }
}
