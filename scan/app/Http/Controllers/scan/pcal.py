import math
import probability
import csv

kst=['a','b','ab','bc','abc','abcd','abcde']
domain=5
def probadjust(correct,kst,start,questate,domain,m_f,probab):
    m_f1=10**math.ceil((domain/4))
    add=0
    sub=0
    
    for st in kst:
        if(start in st):
            add = add + 1
        else:
            sub = sub + 1
    if(add==0):
        factor=sub
        add=1
    elif(sub==0):
        factor=add
        sub=1
    else:
        factor = add*sub
    factor=factor*m_f1
    sum1=0
    print(probab)
    for i in range(len(probab)):
        sum1 = sum1 + probab[i]
    print("Sum before: "+str(sum1))
    for st in kst:
        if(start in st):
            if(correct == 1):
                probab[kst.index(st)]+=factor/add
            else:
                probab[kst.index(st)]-=factor/add
        else:
            if(correct == 1):
                probab[kst.index(st)]-=factor/sub
            else:
                probab[kst.index(st)]+=factor/sub
    sum2=0
    print(probab)
    for i in range(len(probab)):
        sum2 = sum2 + probab[i]
    print("Sum After: "+str(sum2))
    if(sum1 == sum2):
        print("same")
    else:
        print("diff")        
    return probab
def pcal(kst,domain):
    m_f=10**math.ceil((domain/2))
    dom = kst[-1]
    initial_probability = 1/len(kst)
    init = [0]*len(dom)
    probab = [initial_probability*m_f]*len(kst)
    
    start=probability.startState(domain,kst,dom,initial_probability,probab,init)
    ##print(start)
    total = len(kst)
    initial = [-1]*domain
    i,j = 0,0
    final = [-1]*domain
    for index in range(total):
        if initial[len(kst[index])-1] == -1:
            initial[len(kst[index])-1] = index
            final[len(kst[index])-1] = index
        else :
            final[len(kst[index])-1] = index
    f= open("Book3.csv")
    csv_f=csv.reader(f)                
    noq=5
    for x in range(noq):
        print("Start: "+start)
        for t in kst:
            if(start in t):
                questate = t
                print("Questate: ")
                print(questate)
                break
            else:
                continue
            
        for row in csv_f:
            if(row[0].strip() == questate and str(row[7]) == str(0)):
                print("Question: "+row[1])
                print("A: "+row[2])
                print("B: "+row[3])
                print("C: "+row[4])
                print("D: "+row[5])
                ans=""
                ans = input("Type your Answer: ")
                if(str(ans) == str(row[6])):
                    correct = 1
                else:
                    correct = 0
                    
                probab = probadjust(correct,kst,start,questate,domain,m_f,probab)
                row[7] = 1
                break
        if(questate == dom and correct == 1):
            print("Final State Reached")
            print("State:"+kst[6])
            break
        init[dom.index(start)] = 1
        start=probability.startState(domain,kst,dom,initial_probability,probab,init)
    f.close()
    return

pcal(kst,domain)
