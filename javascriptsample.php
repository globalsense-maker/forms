<html>
<script type="text/javascript">
var d = new Date()
var time = d.getHours()
if (time<10)
{
document.write("<b>Good morning</b>");
}
else if (time>10 && time<16)
{
document.write("<b>Good day</b>");
}
else
{
document.write("<b>Hello World!</b>");
}
</script>

</html>


<html>
<head>
<script type="text/javascript">
var txt="Hello World!";
document.write(txt.length);
</script>
</head>
<body>
<script type="text/javascript">
var a=6;
var b=7;
var c=(a*b);
document.write(c);
</script>
<input type="button" value="View message" onclick="message()" />
</body>
</html>
