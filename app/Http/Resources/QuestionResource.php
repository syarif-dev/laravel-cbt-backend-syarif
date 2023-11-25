<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'category' => $this->category,
            'first_choice' => $this->first_choice,
            'second_choice' => $this->second_choice,
            'third_choice' => $this->third_choice,
            'fourth_choice' => $this->fourth_choice,
        ];
    }
}
