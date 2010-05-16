<?php
/* vim:set tabstop=4 softtabstop=4 shiftwidth=4 noexpandtab: */
class mbMetadata {
    private $artist = null;
    private $track = null;
    private $release = null;
    private $label = null;
    private $rating = null;
    private $artistList;
    private $trackList;
    private $releaseList;
    private $userList;

    public function __construct() {
        $this->artistList  = array();
        $this->trackList   = array();
        $this->releaseList = array();
        $this->userList    = array();
    }

    public function setArtist(mbArtist $artist) { $this->artist = $artist; }
    public function setTrack(mbTrack $track) { $this->track = $track; }
    public function setRating(mbRating $rating) { $this->rating = $rating; }
    public function setRelease(mbRelease $release) { $this->release = $release; }
    public function setLabel(mbLabel $label) { $this->label = $label; }

    public function getArtist($remove=false) {
        $a = $this->artist;
        if ($remove)
            $this->artist = null;
        return $a;
    }

    public function getTrack($remove=false) {
        $t = $this->track;
        if ($remove)
            $this->track = null;
        return $t;
    }

    public function getRating($remove=false) {
        $r = $this->rating;
        if ($remove) {
            $this->rating = null;
        }
        return $r;
    }

    public function getRelease($remove=false) {
        $r = $this->release;
        if ($remove)
            $this->release = null;
        return $r;
    }

    public function getLabel($remove=false) {
        $l = $this->label;
        if ($remove)
            $this->label = null;
        return $l;
    }

    public function getUserList() { return $this->userList; }
    public function getArtistResults() { return $this->artistList; }
    public function getTrackResults() { return $this->trackList; }
    public function getReleaseResults() { return $this->releaseList; }

    public function getUserList2($remove) {
        $ul = $this->userList;
        $this->userList = array();
        return $ul;
    }

    public function getArtistResults2($remove) {
        $al = $this->artistList;
        $this->artistList = array();
        return $al;
    }

    public function getTrackResults2($remove) {
        $tl = $this->trackList;
        $this->trackList = array();
        return $tl;
    }

    public function getReleaseResults2($remove) {
        $rl = $this->releaseList;
        $this->releaseList = array();
        return $rl;
    }
}
?>
