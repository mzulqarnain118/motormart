<?php
    include_once("header_dashboard.php");
    $select= "SELECT id,title,popular FROM `makers` ";
    $result_count = mysqli_query($con,$select);
    if(mysqli_num_rows($result_count)>0){
         $arr = array();
        $i=1;
        while($val =  mysqli_fetch_assoc($result_count)){
            if($val['popular']==1){
                $arr[$i]= array("name"=>$val['title'],"abbreviation"=>"al_".$val['id'],"checked_val" => "yes","id"=>$val['id']);
            }else{
                $arr[$i]= array("name"=>$val['title'],"abbreviation"=>"al_".$val['id'],"checked_val" => "no","id"=>$val['id']);
            } 
            $i++;
        }
    }

?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f9">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xxl-10 offset-xxl-2 dashboard_grid_space">
                <!----INC SIDEBAR------>
                   <?php include_once("sidebar.php"); ?>
                <!-----END INC SIDEBAR----->
					<div class="row">
						<div class="col-xl-8">
              <div class="breadcrumb_content mb50">
                <h2 class="breadcrumb_title">Manage Popular Makes</h2>
                <p>Ready to jump back in!</p>
                
              </div>
						</div>
					</div>
                  <div class="row">
                 
                    <div class="col-sm-12 col-md-6 col-lg-6">
                     <?php
                          if(isset($_SESSION['error_ocr'])){
                            ?>
                                <div class="alert alart_style_three alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['error_ocr']; ?>
                                </div>
                            <?php
                            unset($_SESSION['error_ocr']);
                        }
                      ?>
                      <div class="shortcode_widget_form">
                        <div class="ui_kit_input mb25">
                          <form method="post" action="controlling.php" enctype="multipart/form-data">
                            <input type="hidden" name="cmd" value="manage_makers" />
                            <div class="form-group p-1">
                          
                                <div class="dropdown-container">
                                    <div class="dropdown-button noselect">
                                        <div class="dropdown-label">Set Popular Makers (<span class="quantity">Any</span>)</div>
                                        <!--<div class="dropdown-quantity"></div>-->

                                    </div>
                                    <div class="dropdown-list mydropdown" >
                                        <input type="search" placeholder="Search listing" class="dropdown-search"/>
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group p-1">
                                <input type="submit" class="btn btn-lg btn-primary" value="Save" />
                            </div>
                          </form>
                        </div>
                        </div>
                       </div>        
                  </div>
				</div>
			</div>
		</div>
	</section>
<style>
.noselect {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.dropdown-container, .instructions {
    width: 100%;
    margin: 20px auto 0;
    font-size: 14px;
    font-family: sans-serif;
    overflow: auto;
    background: #fff;
    color:#000;
}

.instructions {
    width: 100%;
    text-align: center;
}

.dropdown-button {
    float: left;
    width: 100%;
    background: whitesmoke;
    padding: 10px 12px;

    cursor: pointer;
    border: 1px solid lightgray;
    box-sizing: border-box;
    
    .dropdown-label, .dropdown-quantity {
        float: left;
    }
    
    .dropdown-quantity {
        margin-left: 4px;
    }
    
    .fa-filter {
        float: right;
    }
}

.dropdown-list {
    float: left;
    width: 100%;
    border-top: none;
    box-sizing: border-box;
    padding: 10px 12px;
    height: 200px !important;
    
    input[type="search"] {
        padding: 5px 0;
    }
    
     ul {
        margin: 10px 0;   
        overflow-y: auto;
        input[type="checkbox"] {
            position: relative;
            top: 2px;
        }
    }
}
.dropdown-list ul li{
    list-style: none;
}
</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
<script type="text/javascript">
// Events
$('.dropdown-container')
	.on('click', '.dropdown-button', function() {
        $(this).siblings('.dropdown-list').toggle();
	})
	.on('input', '.dropdown-search', function() {
    	var target = $(this);
        var dropdownList = target.closest('.dropdown-list');
    	var search = target.val().toLowerCase();
    
    	if (!search) {
            dropdownList.find('li').show();
            return false;
        }
    
    	dropdownList.find('li').each(function() {
        	var text = $(this).text().toLowerCase();
            var match = text.indexOf(search) > -1;
            $(this).toggle(match);
        });
	})
	.on('change', '[type="checkbox"]', function() {
        var container = $(this).closest('.dropdown-container');
        var numChecked = container. find('[type="checkbox"]:checked').length;
    	container.find('.quantity').text(numChecked || 'Any');
	});

// JSON of States for demo purposes
var usStates = <?php echo json_encode($arr); ?>;

// <li> template
var stateTemplate = _.template(
    '<li>' +
    	'<input name="popular_makers[]" id="<%= abbreviation %>" value="<%= id %>" type="checkbox"  <%= chek_kk %>>' +
    	' <label for="<%= abbreviation %>"><%= capName %></label>' +
    '</li>'
);

// Populate list with states
_.each(usStates, function(s) {
    s.capName = _.startCase(s.name.toLowerCase());
    if(s.checked_val=='yes'){
        s.chek_kk = "checked='checked'";  
    }else{
        s.chek_kk = "";
    }
    $('.mydropdown ul').append(stateTemplate(s));
});
</script>
<?php
include_once("footer.php");
?>