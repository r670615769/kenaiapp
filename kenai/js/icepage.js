function PrePage()
{
    PageA=document.getElementsByClassName('liAct');
    for(j=1;j<PageA.length;j++)
    {
        if (PageA[j].className=="active liAct")
        {
            k=j;
        }
    }
    ChooseTable(k-1);
}
function AftPage()
{
    PageA=document.getElementsByClassName('liAct');
    for(j=0;j<PageA.length-1;j++)
    {
        if (PageA[j].className=="active liAct")
        {
            k=j;
        }
    }
    ChooseTable(k+1);
}
function ChooseTable(Choose)
{
    PageD=document.getElementsByClassName('PageDemo');
    for(i=0;i<PageD.length;i++)
    {
        PageD[i].style.display="none";
    }
    PageD[Choose].style.display="block";
    PageA=document.getElementsByClassName('liAct');
    for(i=0;i<PageA.length;i++)
    {
        PageA[i].className="liAct";
    }
    PageA[Choose].className="active liAct";
}