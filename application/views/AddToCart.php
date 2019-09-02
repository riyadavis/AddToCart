<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Add To Cart</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="StyleSheet" type="text/css" href="<?php echo base_url()."assets/css/bootstrap.min.css"; ?>">
    <link rel="StyleSheet" type="text/css" href="<?php echo base_url()."assets/css/main.css"; ?>">
</head>
<body>
	<form action=""> 
        <div id="product"></div> 
        <!-- <input type="hidden" name ="pid" id="pid">   -->
    </form>
    <div id="message" style="width:30%;"></div>
</body>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
<script>
    $(document).ready(function(){

        InsertProduct();

        var product = document.getElementById('product');
        var pimage = document.getElementById('pimage');
        // var productArray = new Array();
        // i=0;

        async function InsertProduct()
        {
            let url = "<?php echo site_url('AddToCartApi/insertProduct'); ?>";
            var request = await fetch(url);
            var response = await request.json();
            response.map(r=>{
                var nam = document.createElement('input');
                    nam.value = r.product_name;
                    nam.id = "nam";
                    nam.name = "nam";
                    
                    // productArray[i]=r.product_name;
                    // i++;
                var image = document.createElement('img');
                    image.src = "<?php echo base_url().'assets/img/'?>"+r.product_image;
                    image.setAttribute("height","80px");
                    image.setAttribute("width","80px");
                var para = document.createElement('p');
                var button = document.createElement('input');
                    button.type = "button";
                    // button.id = r.id;
                    button.value = "Add To Cart";
                var quantity = document.createElement('input');
                    quantity.type = "number";
                    quantity.placeholder = "quantity";
                    quantity.name = "quantity";
                    quantity.id = "quantity";
                    quantity.value = 1;
                var pid = document.createElement('input');
                    pid.value = r.id;
                    pid.id = "pid";
                    pid.name = "pid";
                    pid.type = "hidden";
              
                product.appendChild(nam);
                product.appendChild(image);
                product.appendChild(quantity);
                product.appendChild(button);
                product.appendChild(para);
                
                button.onclick = async function(){
        
                        let url = "<?php echo site_url('AddToCartApi/addCart'); ?>";
                        let form = new FormData();
                        form.append('pid',pid.value);
                        form.append('quantity',quantity.value);
                        // console.log(pid.value);
                        // form.append('nam',nam.value);
                        let request = await fetch(url,{
                            method: 'post',
                            body:form
                        });
                        let response = await request.json();
                        console.log(response);
                        var message = document.getElementById('message');
                        if(response == "success")
                        {
                            message.style.display = "block";
                            message.textContent = "Added to Cart";
                        }
                        else
                        {
                            message.style.display = "block";
                            message.textContent = "Please Try Again"; 
                        }
                    
                }
            });
            
        }
    });
</script>
</html>