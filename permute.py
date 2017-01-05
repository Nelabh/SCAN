from itertools import combinations
def combination(list1,elements):
    r=1
    while r <= len(list1):        
        for c in combinations(list1,r):
            ele = ""
            for i in range(len(c)):
                ele += c[i]
            elements.append(ele)
        r += 1
    return
def permute(string1,string2,comparison):
    list1 = []
    list2 = []
    common = []
    for index1 in range(len(string1)):
        if(comparison[ord(string1[index1])] == 1):
            list1.append(string1[index1])
        else:
            common.append(string1[index1])

    for index2 in range(len(string2)):
        if(comparison[ord(string2[index2])] == 1):
            list2.append(string2[index2])           
    comstr = ""
    elements = []
    elements2 = []
    combi = []
    if common:
        for ind in range(len(common)):
            comstr += common[ind]
    if list1:
        combination(list1,elements)
    if list2:
         combination(list2,elements2)
    for index in elements:
        for index2 in elements2:
            app = ''.join(sorted(comstr+index+index2))
            if app not in combi:
                combi.append(app)
    combi = sorted(combi, key=lambda x: len(x))
    return combi

def lexico(string):
    return

elements = []
list1 = ['a','b','c']
combination(list1,elements)
