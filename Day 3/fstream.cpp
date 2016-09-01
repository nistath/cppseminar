#include <fstream>
using namespace std;

int main() {
    //ifstream in("input.txt");
    ofstream out("output.txt");

    out<<"POTATO!";

    //in.close();
    out.close(); // Close the stream when you're done with it.

    return 0;
}
