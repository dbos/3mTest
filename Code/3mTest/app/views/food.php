<div id="food_1" class="container_16">
    <div class="grid_15 prefix_1">
        <h1><span class="green">Food Inc</span> Verification Portal</h1>
        <p>Thanks for registering your new <span class="green">Food Inc name.</span><br>
The verification portal is where you will take the final step: verify your eligibility<br>
as a <span class="green">Food Inc</span> domain name registrant.</p>
        <p> To be eligible for a Food Inc domain you must be certified organic by certain <br>
        standards bodies, or otherwise be eligible under the Food Inc registration policy.</p> 
        <p><a href="/eligibility">You can read the full eligibility policy here.</a></p>
    </div>
</div>
<div id="food_2" class="container_16">
    <div class="grid_15 prefix_1">
        <h2>Here's what may be needed to complete the verification process:</h2>
        <ul>
            <li>The name of your Certified Operator</li>
            <li>The name of your Certifier and license number, or</li>
            <li>Information that shows you meet the criteria of your registrant class</li>
        </ul>
    </div>
</div>
<div id="food_3" class="container_16">
    <div class="grid_13">
        <p>OK - let's get started. If you need help,<br>the Support link is always at the top of the page.</p>
    </div>
    <button id="start_button" class="grid_2">
Start
    </button>
</div>
<script>
$(document).ready(function(){
    $('#start_button').click(function(a){
        modal().open({width:'445px'});
        $content.append($('<img id="circle_icon" src="/img/circleIcon.png"></img>'));
        $content.append($('<h2>Havent created your <br><span class="green">Food Inc</span> Verification Account?</h2>'));
        $content.append($('<p>Your Food Inc Verification Account allows you to access your verification history, notifications and any uploaded documents.</p>'));
        $content.append($('<button id="create_button">Create Account</button>'));
        modal().center();
    });
});
</script>
