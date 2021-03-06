<?php

class Propagation_PropagationTotalStruct implements DataAccess_IDaoStruct {

    /**
     * @var array
     */
    private $totals;

    /**
     * @var array
     */
    private $propagated_ids;

    /**
     * @var array
     */
    private $segments_for_propagation;

    public function __construct() {
        $this->totals                   = [];
        $this->propagated_ids           = [];
        $this->segments_for_propagation = [
                'propagated'     => [
                        'ice'     => [],
                        'not_ice' => [],
                ],
                'not_propagated' => [
                        'ice'     => [],
                        'not_ice' => [],
                ],
        ];
    }

    /**
     * @return array
     */
    public function getTotals() {
        return $this->totals;
    }

    /**
     * @param array $params
     */
    public function setTotals( $params ) {
        $this->totals[ 'total' ]    = $params[ 'total' ];
        $this->totals[ 'countSeg' ] = $params[ 'countSeg' ];
        $this->totals[ 'status' ]   = $params[ 'status' ];
    }

    /**
     * @return array
     */
    public function getPropagatedIds() {
        return $this->propagated_ids;
    }

    /**
     * @param array $propagated_ids
     */
    public function setPropagatedIds( $propagated_ids ) {
        foreach ($propagated_ids as $propagated_id){
            $this->addPropagatedId($propagated_id);
        }
    }

    /**
     * @param int $id_segment
     */
    public function addPropagatedId( $id_segment ) {
        if ( false === in_array( $id_segment, $this->propagated_ids ) ) {
            $this->propagated_ids[] = $id_segment;
            $this->segments_for_propagation[ 'propagated_ids' ][] = $id_segment;
        }
    }

    /**
     * @return array
     */
    public function getSegmentsForPropagation() {
        return $this->segments_for_propagation;
    }

    /**
     * @param Translations_SegmentTranslationStruct $segmentTranslation
     */
    public function addPropagatedIce( Translations_SegmentTranslationStruct $segmentTranslation ) {
        $this->segments_for_propagation[ 'propagated' ][ 'ice' ][ 'id' ][]     = $segmentTranslation->id_segment;
        $this->segments_for_propagation[ 'propagated' ][ 'ice' ][ 'object' ][] = $segmentTranslation;
    }

    /**
     * @param Translations_SegmentTranslationStruct $segmentTranslation
     */
    public function addNotPropagatedIce( Translations_SegmentTranslationStruct $segmentTranslation ) {
        $this->segments_for_propagation[ 'not_propagated' ][ 'ice' ][ 'id' ][]     = $segmentTranslation->id_segment;
        $this->segments_for_propagation[ 'not_propagated' ][ 'ice' ][ 'object' ][] = $segmentTranslation;
    }

    /**
     * @param Translations_SegmentTranslationStruct $segmentTranslation
     */
    public function addPropagatedNotIce( Translations_SegmentTranslationStruct $segmentTranslation ) {
        $this->segments_for_propagation[ 'propagated' ][ 'not_ice' ][ 'id' ][]     = $segmentTranslation->id_segment;
        $this->segments_for_propagation[ 'propagated' ][ 'not_ice' ][ 'object' ][] = $segmentTranslation;
    }

    /**
     * @param Translations_SegmentTranslationStruct $segmentTranslation
     */
    public function addNotPropagatedNotIce( Translations_SegmentTranslationStruct $segmentTranslation ) {
        $this->segments_for_propagation[ 'not_propagated' ][ 'not_ice' ][ 'id' ][]     = $segmentTranslation->id_segment;
        $this->segments_for_propagation[ 'not_propagated' ][ 'not_ice' ][ 'object' ][] = $segmentTranslation;
    }
}


