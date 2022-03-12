<?php

namespace Fixtures;

class JobFixtures
{
    /**
     * Get job valid payload
     *
     * @return array
     */
    static public function getJobValidPayload(): array
    {
        $json = '[
            {
                "id": 1,
                "company": "Photosnap",
                "logo": "logo-in-base-64",
                "new": true,
                "featured": true,
                "position": "Senior Frontend Developer",
                "role": "Frontend",
                "level": "Senior",
                "postedAt": "1d ago",
                "contract": "Full Time",
                "location": "USA Only",
                "languages": [
                    "HTML",
                    "CSS",
                    "JavaScript"
                ],
                "tools": []
            },
            {
                "id": 2,
                "company": "Manage",
                "logo": "logo-in-base-64",
                "new": true,
                "featured": true,
                "position": "Fullstack Developer",
                "role": "Fullstack",
                "level": "Midweight",
                "postedAt": "1d ago",
                "contract": "Part Time",
                "location": "Remote",
                "languages": [
                    "Python"
                ],
                "tools": [
                    "React"
                ]
            }
        ]';

        return json_decode($json, true);
    }
}
