import permute
inp1 = ['a','b','ac','abcd','abcde']
total = len(inp1)
domain = 5
initial = [-1]*domain
i,j = 0,0
final = [-1]*domain
for index in range(total):
    if initial[len(inp1[index])-1] == -1:
        initial[len(inp1[index])-1] = index
        final[len(inp1[index])-1] = index
    else :
        final[len(inp1[index])-1] = index    
print("INITIAL")
print(initial)
print("FINAL")
print(final)

for index in range(total-1):
    if initial[len(inp1[index])] == -1:
        index2 = initial[len(inp1[index])+1]
        print("-1 encountered") #input data here itself else blunder!!!!
    else:
        index2 = initial[len(inp1[index])]
        while index2 <= final[len(inp1[index])]:
            comparison = [0]*256
            for check in range(len(inp1[index])):
                if comparison[ord(inp1[index][check])] == 0:
                    comparison[ord(inp1[index][check])] = 1
                elif comparison[ord(inp1[index][check])] == 1:
                    comparison[ord(inp1[index][check])] = 0
            for check in range(len(inp1[index2])):
                #print(inp1[index2])
                if comparison[ord(inp1[index2][check])] == 0:
                    comparison[ord(inp1[index2][check])] = 1
                elif comparison[ord(inp1[index2][check])] == 1:
                    comparison[ord(inp1[index2][check])] = 0
            diff = 0
            for ini in range(256):
                diff = diff + comparison[ini]
            #print(diff)
            if( diff > 1):
                permute.permute(inp1[index],inp1[index2],comparison)
                #print("Permute Values") # Permute values here also  
            #print(comparison)
            #break
            index2 = index2+1;
    #break
            
