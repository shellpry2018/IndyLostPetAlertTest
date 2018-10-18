<style>
.mh-main, #ui-datepicker-div
{
	display: none;
}
.confirmation-button
{
	color: white !important;
    background: black;
    display: inline-block;
    font-family: arial, sans-serif;
    font-weight: normal;
    padding: 10px 20px;
    text-decoration: none !important;
    cursor: pointer;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
    margin:10px 0 40px;
}
.confirmation-button:hover,
.confirmation-button:focus,
.confirmation-button:active
{
	background: #63addd;
}
</style>

<h1 style="margin-bottom: 20px">Please confirm your report</h1>
<h3>Do you have possession of the animal, and is it contained?</h3>
<a href="/report-a-found-pet?ReportConfirmed=true" class="confirmation-button">Yes, I have the animal contained</a>

<h3>Have you seen the animal, but do not have it in your possession?</h3>
<a href="/report-a-sighting?ReportConfirmed=true" class="confirmation-button">Yes, I've only seen the animal, but do not have possession</a>
