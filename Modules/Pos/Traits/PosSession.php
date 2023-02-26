<?php

namespace Modules\Pos\Traits;

trait PosSession {
    /**
     * @param string $request
     *
     * @return string
    */
    public function getCurrentPos() {

        if (session()->has('pos_session')){
            $current_pos = $this->posRepository->currentPos();
        }

        return $current_pos;
    }
}
