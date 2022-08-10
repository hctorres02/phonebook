<?php

namespace App\Services;

use App\Helpers\Preference;
use App\Models\Number;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class NumberPreferenceService
{
    /**
     * Store preferences for the Number
     *
     * @param \App\Models\Number $number
     * @param array $preferences
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store(Number $number, array $preferences): EloquentCollection
    {
        $preferences = $this->mapPreferences($number, $preferences);

        return $number->preferences()->createMany($preferences);
    }

    /**
     * Update preferences for the Number
     *
     * @param \App\Models\Number $number
     * @param array $preferences
     * @return int
     */
    public function update(Number $number, array $preferences): int
    {
        $preferences = $this->mapPreferences($number, $preferences);

        return $number->preferences()->upsert($preferences, ['name'], ['value']);
    }

    /**
     * Map preferences to expected format
     *
     * @param \App\Models\Number $number
     * @param array $preferences
     * @return array
     */
    public function mapPreferences(Number $number, array $preferences): array
    {
        $number_id = $number->id;
        $preferences_ids = $number->preferences()->pluck('id', 'name');

        return array_map(function ($preference) use (
            $number_id,
            $preferences,
            $preferences_ids
        ) {
            return [
                'id' => $preferences_ids[$preference] ?? null,
                'number_id' => $number_id,
                'name' => $preference,
                'value' => in_array($preference, $preferences),
            ];
        }, Preference::toArray());
    }
}
