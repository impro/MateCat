import IconQR from "../icons/IconQR";

class QualityReportButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            is_pass : null,
            score: null, 
            vote: this.props.vote
        };
    }

    getVote() {
        if ( this.state.is_pass != null ) {
            if ( this.state.is_pass ) {
                return 'excellent'; 
            }
            else {
                return 'fail'; 
            }
        }

        else {
            return this.state.vote ;
        }
    }

    render() {
        var label = "QUALITY REPORT"; 

        if ( this.state.score != null ) {
            label = sprintf("QUALITY REPORT (%s)",
                            parseFloat(this.state.score).toFixed(2));
        }

        return <a id="quality-report"
        className="draft"
        data-vote={this.getVote()} 
        href={this.props.quality_report_href}
        target="_blank">
           {/* {label}*/}
            <IconQR width={30} height={30}/>
        </a> ;
    }
}

export default QualityReportButton ; 
