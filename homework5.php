<!DOCTYPE html>
<html>
<head>
    <title>만년 달력</title>
    <script language="javascript">
        function changeColor()
    {
        var color = ["#071019"];
        var title = document.getElementById("body");
        var i = 0;
 
        setInterval(function(){
        title.style.color = color[i]; //title의 색상을 바꿈
        i = (i+1) % color.length;
    }, 50);
    }
    </script>
    <script language="javascript">
        var today = new Date();
        var year = today.getFullYear();
        var month = today.getMonth();
        var day = today.getDay();
 
        month += 1;
 
        function dayy(year, month){ //월의 일수를 구함
            switch(month){
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                return 31;
 
                case 4: case 6: case 9: case 11:
                return 30;
 
                case 2:
                if(((year%400)==0||(year%4)==0&&(year%100)!=0)){
                    return 29;
                }
                else{
                    return 28;
                }
            }
            
        } 
 
        
        
    
        function prevmonth(){ //이전 월로 가는 함수
        
        var ymda = document.getElementById("prev");
        var yg = document.getElementById("Ymd");
 
        month--;
        if(month < 1){
            month = 12;
            year -= 1;
        }
        if(year < 1970){
            alert("기원전");
             for(var i=1;i<100;i--){
            window.top.moveTo(i ,i *=-1);
            }
        }
 
        var ymda = year + "년" + (month)+"월";
    
        present();
        } 
 
        function nextmonth(){  //다음 월로 가는 함수
              
        var ymda = document.getElementById("next");
        var yg = document.getElementById("Ymd");
 
        month++;
        if(month > 12){
            month = 1;
            year += 1;
        }
 
        var ymda = year + "년" + month+"월";
    
        present();
 
        }
 
        function present(){
        
        var start = new Date(year, month-1, 1);
        var ymda = document.getElementById("Ymd");
        var Tab = document.getElementById("tab");
        
 
        var row = null;
        var cnt = 0;
        
        
        var ym = year + "년" + (month)+"월";
    
        ymda.innerHTML = ym;
 
        while(tab.rows.length >2){     //테이블의 행의 길이가 2보다 크면 테이블의 행 제거함.
            tab.deleteRow(tab.rows.length -1);
        }
 
        row = Tab.insertRow();
        
 
        for(var j = 0; j<start.getDay(); j++){ //달력의 시작 일 구함
            cell = row.insertCell();
            cnt+=1;
        }
 
        for(var i = 0; i< dayy(year, month); i++){ //달력 일수만큼 찍어줌
        cell = row.insertCell();
        cell.innerHTML = i+1;
        cnt += 1;
 
        if(cnt%7 ==0){ //cnt가 7이면 행을 늘려줌
            row = tab.insertRow();
            
        }
    }
 
    }
    </script>
</head>
<center>
<body onload="changeColor()" id="body">
    
    <table class = "blueText" border="1" id = "tab">
        <tr>
            <td align="center" id="prev" style="width: 23px;"><label onclick="prevmonth()">≤</td>
            <td colspan="5" align="center" id="Ymd" style="width: 150px; height: 30px;"></td>
            <td align="center" id="next" style="width: 23px;"><label onclick="nextmonth()">≥</td>
        </tr>
        
            
        <tr align="center">
            <td align="center">일</td>
            <td align="center">월</td>
            <td align="center">화</td>
            <td align="center">수</td>
            <td align="center">목</td>
            <td align="center">금</td>
            <td align="center">토</td>
            
        </tr>
        
    </table>
<script type="text/javascript">
            present();
            
        </script>
 
</body>
</center>
</html>
 