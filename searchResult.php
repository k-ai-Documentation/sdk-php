<?php

class SearchResult {
    private $query;
    private $answer;
    private $confidentRate;
    private $gotAnswer;
    private $reason;
    private $documents;
    private $followingQuestions;

    public function __construct($query, $answer, $confidentRate, $gotAnswer, $reason, $documents, $followingQuestions) {
        $this->query = $query;
        $this->answer = $answer;
        $this->confidentRate = $confidentRate;
        $this->gotAnswer = $gotAnswer;
        $this->reason = $reason;
        $this->documents = $documents;
        $this->followingQuestions = $followingQuestions;
    }
}
