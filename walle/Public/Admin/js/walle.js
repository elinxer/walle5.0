
function subForm(){
	 $.post("walle/index.php/Admin/Config/base",
    {
      name:"Donald Duck",
      city:"Duckburg"
    },
    function(data,status){
      alert("数据：" + data + "\n状态：" + status);
    });
}