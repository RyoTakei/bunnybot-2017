#!/usr/bin/env python

import MySQLdb
import os

def get_ave():
    team_data = []
    filtered_data = []
    team_numbers = []
    team_score_list = []
    final_list = []
    db = MySQLdb.connect(user="root", passwd="1234", db="BunnyBots_Scouting",
                         unix_socket="/opt/lampp/var/mysql/mysql.sock")
    cursor = db.cursor()
    cursor.execute("SELECT team_number, score FROM scouting")
    data = cursor.fetchall()
    for i in data:
        team_data.append((i[0], i[1]))

    for data in team_data:
        try:
            filtered_data.append((int(data[0]), int(data[1])))
        except ValueError:
            pass
        except Exception as ex:
            print(type(ex))
            print(ex)

    file = open("/tmp/data.csv", 'w+')
    for i in filtered_data:
        file.write("'" + str(i[0]) + "'," + str(i[1]) + "\n")
        team_numbers.append(i[0])
    file.close()

    num, final_team_numbers = find_num_lists(team_numbers)

    for item in filtered_data:
        _, index_list = find_num_lists(team_numbers)
        final_team_numbers[index_list.index([item[0]])].append(item[1])

    for i in final_team_numbers:
        final_list.append([i[0], find_ave(i)])

    final_file = open("/tmp/ave.text", "w+")
    for i in final_list:
        final_file.write("team: " + str(i[0]) + ", score: " + str(i[1]) + '\n')

    final_file.close()
    print(final_list)
    return final_list


def find_ave(score_list):
    total = 0
    for i in range(1, len(score_list)):
        total += score_list[i]
    return total / (len(score_list) - 1)
    # return int("{0:.2f}".format(total / len(score_list) - 1))


def find_num_lists(team_list):
    seen = []
    for item in team_list:
        try:
            seen.index([item])
        except ValueError:
            seen.append([item])

    return len(seen), seen


if __name__ == '__main__':
    get_ave()
