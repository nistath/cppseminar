#include <iostream>

using namespace std;
void disks(int num, int origin, int target, int other){
    if(num == 1) cout << "Moving disk 1 from " << origin <<" to " << target << endl;
    else{
      disks(num - 1, origin, other, target);
      cout << "Moving disk " << num << " from " << origin << " to " << target << endl;
      disks(num - 1, other, target, origin);
    }
}
int main(){
    disks(3, 1, 3, 2);
    return 0;
}
