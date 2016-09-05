#include <iostream>
using namespace std;

int main() {
    int hrs, min, sec;
    cin>>hrs>>min>>sec;

    hrs=2*hrs;
    min=2*min;
    sec=2*sec;

    if(sec>59){
        sec=sec-60;
        min++;
    }

    if(min>59){
        min=min-60;
        hrs++;
    }

    if(hrs<10) cout<<0;
    cout<<hrs<<":";

    if(min<10) cout<<0;
    cout<<min<<":";

    if(sec<10) cout<<0;
    cout<<sec;

    return 0;
}
