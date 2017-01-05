from itertools import combinations
def combination(list1,elements):
    r=1
    print("Elements")
    while r <= len(list1):        
        for c in combinations(list1,r):
            ele = ""
            for i in range(len(c)):
                ele += c[i]
            elements.append(ele)
        r += 1
    print(elements)
    return
def permute(string1,string2,comparison):
    #print("STRING 1 :")
   # print(string1)
    #print("STRING 2 :")
    #print(string2)
    #print("COMPARISON :")
    #print(comparison)
    
    list1 = []
    list2 = []
    common = []
#    print("LIST 1 Before :")
 #   print(list1)
  #  print("LIST 2BEFORE:")
   # print(list2)
   # print("COMMON Before :")
   # print(common)
    
    for index1 in range(len(string1)):
        if(comparison[ord(string1[index1])] == 1):
            list1.append(string1[index1])
        else:
            common.append(string1[index1])

    for index2 in range(len(string2)):
        if(comparison[ord(string2[index2])] == 1):
            list2.append(string2[index2])           
    #print("COMMON :")
    #print(common)
    #print("LIST 1 :")
    #print(list1)
    #print("LIST 2:")
    #print(list2)
    comstr = ""
    elements = []
    elements2 = []
    if common:
        for ind in range(len(common)):
            comstr += common[ind]
    print("******LIST 1*****")
    if list1:
        combination(list1,elements)
    print("******LIST 2*****")
    if list2:
         combination(list2,elements2)
    print("ELEMENTS: ")
    print(elements)
    print("ELEMENTS 2: ")
    print(elements2)
   
    return

def lexico(string):
    return

elements = []
list1 = ['a','b','c']
combination(list1,elements)
