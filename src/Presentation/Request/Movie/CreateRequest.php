<?php

/**
 * Description of CreateRequest
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */

return [
    'title' => ['min:3', 'required', 'max:25'],
    'description' => ['min:3', 'required'],
];