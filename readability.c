#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <math.h>

void count_words(string arr, int len)
{
    int word = 0;
    int sentences = 0;
    int letter = 0;

    for (int i = 0; i <= len; i++)
    {
        if ((arr[i] >= 'a' && arr[i] <= 'z') || (arr[i] >= 'A' && arr[i] <= 'Z'))
        {
            letter = letter + 1;
        }
        if (arr[i] == ' '  || arr[i] == '\0')
        {
            word = word + 1;
        }
        if (arr[i] == '.' || arr[i] == '!' || arr[i] == '?')
        {
            sentences = sentences + 1;
        }
    }

    printf("%i letter(s)\n",letter);
    printf("%i word(s)\n",word);
    printf("%i sentence(s)\n",sentences);

    float L = ((double)letter / (double)word) * 100;
    float S = ((double)sentences / (double)word) * 100;
    float index = (0.0588 * ((double)L)) - (0.296 * ((double)S)) - 15.8;
    index = round(index);
    int grade;
    if (index > 16)
    {
        grade = 16;
        printf("Grade %i+\n", grade);
    }
    else if (index < 1)
    {
        grade = 1;
        printf("Before Grade %i\n", grade);
    }
    else
    {
        grade = index;
        printf("Grade %i\n", grade);
    }
}
int main(void)
{
    string text = get_string("Text: ");
    int length = strlen(text);
    count_words(text, length);
}
