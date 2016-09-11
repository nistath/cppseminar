#include <stdio.h>
#include <iostream>
#include <algorithm>
#include <iomanip>

using namespace std;

struct rock{
    int M, V;
    double density;
};

bool comp(rock A, rock B){
    if(A.density < B.density) return true;
    return false;
}

int main(){
    int n, knap;
    double sol = 0;
    cin >> n >> knap;
    rock rocks[n];
    for(int i = 0; i < n; i++){
        cin >> rocks[i].M >> rocks[i].V;
        rocks[i].density = (double)rocks[i].M / rocks[i].V;
    }

    sort(rocks, rocks + n, comp);

    int i = n - 1;
    while(i >= 0 && knap > 0){
        if(rocks[i].V < knap){
            knap -= rocks[i].V;
            sol += rocks[i].M;
        }
        else{
            sol += (rocks[i].density * knap);
            knap = 0;
        }
        i--;
    }
    cout << setprecision(3) << sol << endl;
}
